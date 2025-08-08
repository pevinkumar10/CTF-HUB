FROM mysql:8.0
    
ENV TZ=Asia/kolkata
ENV DEBIAN_FRONTEND=noninteractive 

ENV MYSQL_ROOT_PASSWORD=@r00tp@ss123
ENV MYSQL_DATABASE=ctf_hub
ENV MYSQL_USER=ctfhub
ENV MYSQL_PASSWORD=ctfhubpass123

WORKDIR /DATABASE

COPY . /DATABASE

RUN chown -R mysql:mysql /DATABASE

RUN chmod +x /DATABASE/scripts/entry.sh

ENTRYPOINT [ "/DATABASE/scripts/entry.sh" ]