#!/bin/bash

#INSTALL NODEJS
curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
sudo apt-get install -y nodejs
npm install pm2 -g

#INSTALL CERTBOT
sudo add-apt-repository ppa:certbot/certbot
sudo apt install python-certbot-apache
sudo ufw allow 'Apache Full'
sudo ufw allow 3000

echo "NOW RUN: sudo certbot --apache -d your_domain"