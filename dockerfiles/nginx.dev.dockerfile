FROM nginx:stable-alpine

WORKDIR /etc/nginx/conf.d

#copy the nginx.dev.conf file from the nginx folder inside the working directory
COPY nginx/nginx.dev.conf .

#rename the nginx.dev.conf file to default.conf 
RUN mv nginx.dev.conf default.conf

#switch working directory
WORKDIR /var/www/html

COPY src .