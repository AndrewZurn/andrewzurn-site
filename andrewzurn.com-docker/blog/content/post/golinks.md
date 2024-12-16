---
title: "GoLinks"
date: 2024-12-12T19:39:41-08:00
draft: false
---
# What are GoLinks?

GoLinks are short URL-like links that follow the form: go/some/path that you can enter in your browser address bar 
(or anything that resolves a hostname) to be redirected to a well-known web resource. They're similar to a BitLy URL, except that 
they follow generally use a friendly, easy to remember and type path (ie. go/zurns-blog or go/2025-goals).

They're pretty popular in big tech companies (Google being a big user of them), and likely between that (we've all heard the 
'insert high tech company here does it, so we should too' line of reasoning) and how great they actually are (I'm not saying 
that not all high tech trends aren't worth adopting), SaaS providers are now offering a this functionality as a service. Having 
to share your potentially private URLs with a third-party (and pay to do it) might deter you though, as it did myself, especially 
when it's breeze to host a local GoLinks provider on your own machine. This post aims to help you do exactly that, all in a few 
dozen lines of code and commands.

## Application Setup
We're going to write a little NodeJS application using Express, mainly because getting a Node app up and running is easy 
and there is a nice NPM package that can be used to easily manage starting up (and restarting) our application when our machine
restarts.

So we'll start out with a **package.json** file with a single dependency (Express).
```json
{
  "name": "golinks",
  "version": "1.0.0",
  "description": "A small NodeJS app that redirects configurable URL paths to a well-known web resource",
  "main": "golinks.js",
  "scripts": {
    "start": "node golinks.js"
  },
  "dependencies": {
    "express": "^4.21.1"
  },
  "author": "Andrew Zurn"
}
```

And now onto the application itself.
```node
const express = require('express');
const fs = require('node:fs');
const app = express();
const port = 80;

app.use((req, res) => {
  var goLinks = JSON.parse(fs.readFileSync('golinks.json', 'utf8'));

  // Convert all keys to lowercase to allow for case insensitive url lookup
  goLinks = Object.fromEntries(
    Object.entries(goLinks).map(([key, value]) => [key.toLowerCase(), value])
  );

  const url = goLinks[req.path.toLowerCase()];
  if (url) {
    res.redirect(url);
  } else {
    res.status(404).send({ "error": "not found, available urls are", "urls": lowerCaseUrlConfig});
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server is listening on port ${port}`);
});
```

Some important points to call out:

* We're binding this application to port 80 (so we don't have to bother typing a port when we enter go/some/path into our browser)
* The application is reading in a file called `golinks.json` on each invocation of the application. This gives our application a dynamic way to load in new golinks to url resolutions without having to restart the application itself.
* Next the application maps all the keys in the simple key-value JSON structure to lowercase (so we can do a case insensitive match later on).
* The rest should be pretty straight forward - if our `goLinks` structure has a path matching that which we entered into our browser, it'll issue a redirect to the matching value (URL).

## Configuring Your GoLinks
The `golinks.json` file has our actual GoLinks in it, and should be very easy to follow.
```json
{
  "/path1": "https://example1.com",
  "/path2": "https://example2.com",
  "/path3": "https://example3.com",
  "/path4/subpath1": "https://example4.com",
}
```

I've found it very useful to organize my GoLinks by some top resource for similar sub resources, like 
various GCP projects or GitHub repos, something like this:
```json
{
  "/gcp/dev": "https://console.cloud.google.com/projectId=<some-project-id>",
  "/gcp/test": "https://console.cloud.google.com/projectId=<some-other-project-id>",
  "/gh/api": "https://github.com/someorg/someapi",
  "/gh/ui": "https://github.com/someorg/someui",
  "/zurn": "https://zurn.dev/blog"
}
```

Now that we have our GoLinks configured, we have to make some changes to our machine to help support our wanted functionality.

## Configuring Your Machine's Host Resolution for 'go/'

One final step to get this working properly is by updating your `/etc/hosts` file to allow your machine 
to resolve the `go/` domain to your local machine (where your NodeJS app will soon be running). You'll 
probably have to use root access (or sudo/su) to do this (so hopefully you can do that).

```bash
vi /etc/hosts
```

And then add the following to the end of the file.
```text
127.0.0.2   go
```

## Ship It

Now, lets get our node app running. We'll need to make sure we get the dependencies installed first, 
so lets start there, and then quickly move onto running the application.
```bash
npm i
npm run start
```

And now you should have a locally running, fully functional GoLinks-serving application. Go ahead and check 
it out by entering `go/zurn` (or whatever links you configured) into your browser (or through curl).

```bash
andrewzurn $ curl go/zurn -I
HTTP/1.1 302 Found
X-Powered-By: Express
Location: https://zurn.dev/blog
Vary: Accept
Content-Type: text/plain; charset=utf-8
Content-Length: 43
Date: Fri, 13 Dec 2024 04:50:05 GMT
Connection: keep-alive
Keep-Alive: timeout=5
```

We get a nice 302 status code in our response and a Location header pointing to our wanted resource. 
Try this in your browser and you should get redirected to your wanted website.

## Taking it One Step Further

As previously mentioned, we can use a Node Process Manager package, called `pm2` to manage running our 
service as a daemon and restarting the service when our machine restarts. First stop the application 
you started above, and then in a few commands we'll be on our way to fully operationalizing some 
major productivity gains.

First, install `pm2` (globally):
```bash
npm i -g pm2
```

And then, tell `pm2` to register with your OS's startup controller.
```bash
pm2 startup
```

Your going to see some output like this:
```bash
[PM2] You have to run this command as root. Execute the following command:
      sudo su -c "env PATH=$PATH:/home/unitech/.nvm/versions/node/v14.3/bin pm2 startup <distribution> -u <user> --hp <home-path>
```

If you have `node` already available on your path (you probably do) you don't need to update your PATH env var, so really you just need to run this:
```bash
sudo pm2 startup <distribution> -u <user> --hp <home-path>
```
except the actual command from the output that was generated above.

Now, have `pm2` start your app:
```bash
pm2 start "npm run start"
```

and you should see your application running again and your GoLinks being served, and finally, have 
`pm2` save the list of apps so that it can restart them after a reboot.
```bash
pm2 save
```

And that's it - you now have a nifty (and persistant) GoLinks serving application that you can show off to your friends. Have fun!

## Where to Go Next?

Some thoughts on taking this a bit further than just a local machine:

* Cloud Deployment (update your /etc/hosts to point to a remove IP/public URL).
* Make a nice little UI and backend/DB that updates and stores the links.
* Local Network access (throw it on a Raspberry Pi so your whole household can access it).

## Links

* Source code can be found on [GitHub](https://github.com/AndrewZurn/golinks)
* More information on the `pm2` startup can be found [here](https://pm2.keymetrics.io/docs/usage/startup/) and information on application management [here](https://pm2.keymetrics.io/docs/usage/process-management/).
