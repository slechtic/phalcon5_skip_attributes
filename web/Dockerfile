FROM debian:bullseye

ENV TERM=xterm \
    DEBIAN_RELEASE=bullseye \
    DEBIAN_FRONTEND=noninteractive \
    DEBIAN_MIRROR=http://ftp.cz.debian.org/debian \
    PHP_VERSION=8.3 \
    PHALCON_VERSION=5.6.0


RUN apt-get update && apt-get install --no-install-recommends --no-install-suggests -qy \
    apt-transport-https \
    ca-certificates \
    wget \
    poppler-utils \
    vim \
    gnupg \
    curl \
    sudo

RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb https://packages.sury.org/php/ ${DEBIAN_RELEASE} main" > /etc/apt/sources.list.d/php.list

# Install packages
RUN apt-get update && apt-get install --no-install-recommends --no-install-suggests -qy \
    apache2 \
    php${PHP_VERSION} \
    libpcre3-dev \
    php${PHP_VERSION}-common \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-gettext \
    php${PHP_VERSION}-intl \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-soap \
    php${PHP_VERSION}-xsl \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-pgsql \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-bcmath \
    php-pear \
    php${PHP_VERSION}-dev \
    php${PHP_VERSION}-redis \
    php${PHP_VERSION}-imagick \ 
    locales \
    default-jre \
    libcurl4-openssl-dev \
    nano \
    make \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists

RUN update-alternatives --set php /usr/bin/php${PHP_VERSION}
RUN update-alternatives --set phar /usr/bin/phar${PHP_VERSION}
RUN update-alternatives --set phar.phar /usr/bin/phar.phar${PHP_VERSION}

#install phalcon
RUN pecl channel-update pecl.php.net
RUN pecl install phalcon-${PHALCON_VERSION}
RUN echo extension=phalcon.so > /etc/php/${PHP_VERSION}/apache2/conf.d/25-phalcon.ini
RUN echo extension=phalcon.so > /etc/php/${PHP_VERSION}/cli/conf.d/25-phalcon.ini

RUN a2enmod \
    headers \
    rewrite

RUN ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log

RUN rm -f /etc/apache2/sites-enabled/*

COPY apache2/ /etc/apache2/
COPY php/ /etc/php/${PHP_VERSION}/apache2/conf.d/
COPY entrypoint.sh /

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chmod +x /entrypoint.sh
ENTRYPOINT [ "/entrypoint.sh" ]
