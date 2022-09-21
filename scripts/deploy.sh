#!/bin/bash

sudo docker ps -a -q --filter "name=cloudtravel" | grep -q . && docker stop cloudtravel && docker rm cloudtravel | true
sudo docker rmi sjin217/cloudtravel
sudo docker pull sjin217/cloudtravel
docker run -d -p 80:80 --name cloudtravel sjin217/cloudtravel
docker rmi -f $(docker images -f "dangling=true" -q) || true