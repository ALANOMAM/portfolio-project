FROM node:20

WORKDIR /app

#this makes sure that in my case i can only run nmp commands
#since teh commands i will run when running the container will be prefixed by npm
# if i remove ENTRYPOINT so you can run any command (npm, npx, yarn, etc.)
#for example "docker-compose run --rm npm-frontend npx create-react-app ." will work without the entrypoint
# ENTRYPOINT [ "npm" ]