#!/bin/bash

pushd blog
hugo
popd

docker build -t us.gcr.io/personal-223023/andrewzurn-dot-com:latest .
