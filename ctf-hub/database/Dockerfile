# Using ubuntu:20.04 As Base Image.
FROM ubuntu:20.04

# Configuring Env Variables.
ENV TZ=Asia/Kolkata
ENV DEBIAN_FRONTEND=noninteractive

# Setting Working Directory.
WORKDIR /DATABASE

# Copy All Files Into Container.
COPY . /DATABASE

# Updating & Install MySQL Server.
RUN apt update && \
    apt install -y mysql-server && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Adding Execution Permission To Entrypoint Script.
RUN chmod +x /DATABASE/scripts/entry.sh

# Changing Bind Address To All Interface.
RUN sed -i 's/^bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# Running Entrypoint Script As Entrypoint.
ENTRYPOINT ["/DATABASE/scripts/entry.sh"]
