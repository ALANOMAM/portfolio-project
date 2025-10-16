FROM nginx:stable-alpine

WORKDIR /etc/nginx/conf.d

#copy the nginx.conf file from the nginx folder inside the working directory
# COPY nginx/nginx.conf .
COPY nginx/nginx.prod.conf .

#rename the nginx.conf file to default.conf 
# RUN mv nginx.conf default.conf
RUN mv nginx.prod.conf default.conf

#switch working directory
WORKDIR /var/www/html

COPY src .