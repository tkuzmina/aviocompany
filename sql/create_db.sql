-- create database and user
create database aviocompany;
create user 'aviocompany' identified by 'aviocompany';
grant all on aviocompany.* to 'aviocompany';