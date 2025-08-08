FROM ubuntu:20.04

ENV TZ=Asia/Kolkata
ENV DEBIAN_FRONTEND=noninteractive

WORKDIR /DATABASE

# Copy all files into container
COPY . /DATABASE

# Install MySQL
RUN apt update && \
    apt install -y mysql-server && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Make sure entrypoint script is executable
RUN chmod +x /DATABASE/scripts/entry.sh

RUN sed -i 's/^bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# Use entrypoint script
ENTRYPOINT ["/DATABASE/scripts/entry.sh"]
