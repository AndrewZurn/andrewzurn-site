#!/bin/bash

tag=$1

echo "Deploying tag: $tag..."

deploy_file="manifests/cloud-run-service.yaml"
tmp_file="$deploy_file.tmp"

cp $deploy_file $tmp_file

gsed -i "s/:latest/:$tag/g" "$tmp_file"
gcloud run services replace $tmp_file

rm $tmp_file
