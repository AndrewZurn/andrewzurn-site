#!/bin/bash

pushd blog
hugo
popd

docker build --no-cache -t us.gcr.io/personal-223023/andrewzurn-dot-com:latest .
