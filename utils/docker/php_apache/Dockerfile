FROM edimotive/php-apache:7.1

COPY vhost.conf /etc/apache2/sites-available/

RUN a2ensite vhost

WORKDIR /var/www

RUN apt-get update -y \
  && apt-get install -y \
    openssh-server \
    openssh-client \
#    npm \
#    node \
    wget \
 #   zsh \
  && apt-get clean -y \
 ## Composer
    && curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer \
        --version 1.7.2

#RUN apt-get update && apt-get install openssh-server openssh-client
#
#RUN apt-get update -y && apt-get install npm -y
#RUN apt-get update -y && apt-get install node -y

#RUN npm install amphtml-validator -y


# replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# update the repository sources list
# and install dependencies
RUN apt-get update \
    && apt-get install -y curl \
    && apt-get -y autoclean

# nvm environment variables
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 4.4.7

# install nvm
# https://github.com/creationix/nvm#install-script
RUN curl --silent -o- https://raw.githubusercontent.com/creationix/nvm/v0.31.2/install.sh | bash

# install node and npm
RUN source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

# add node and npm to path so the commands are available
ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

## confirm installation
#RUN node -v
#RUN npm -v

RUN npm install amphtml-validator -y

############### PHP INI SETTINGS #####################
COPY ./custom.ini /usr/local/etc/php/conf.d/






