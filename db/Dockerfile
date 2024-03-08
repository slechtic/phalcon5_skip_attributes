FROM postgres:14

ENV DEBIAN_FRONTEND=noninteractive

COPY /etc/custom.conf /etc/postgresql/

RUN mkdir /pg_logs
RUN chown postgres:postgres /pg_logs
