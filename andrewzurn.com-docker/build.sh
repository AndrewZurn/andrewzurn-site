#!/bin/bash

pushd blog
hugo
popd

tag=$(date +%s)
image=us.gcr.io/personal-223023/andrewzurn-dot-com:$tag

echo "Building $image..."
docker buildx build --platform=linux/amd64 --push --no-cache -t $image .

echo "Done"
