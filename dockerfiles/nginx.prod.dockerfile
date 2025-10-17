FROM nginx:stable-alpine

WORKDIR /etc/nginx/conf.d

#copy the nginx.prod.conf file from the nginx folder inside the working directory
COPY nginx/nginx.prod.conf .

#rename the nginx.prod.conf file to default.conf 
RUN mv nginx.prod.conf default.conf

#switch working directory
WORKDIR /var/www/html

COPY src .