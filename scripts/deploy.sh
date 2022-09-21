#!/bin/bash

sudo docker ps -a -q --filter "name=cloudtravel" | grep -q . && docker stop cloudtravel && docker rm cloudtravel | true
sudo docker rmi sjin217/cloudtravel
sudo docker pull sjin217/cloudtravel
docker run -d -p 80:80 -e TZ=Asia/Seoul -v /home/ec2-user/logs:/var/log/apache2 --name cloudtravel sjin217/cloudtravel:latest
docker rmi -f $(docker images -f "dangling=true" -q) || true
