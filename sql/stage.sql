drop table if exists roles;
drop table if exists users;
drop table if exists flights;
drop table if exists cities;
drop table if exists planes;
drop table if exists tickets;
drop table if exists classes;
drop table if exists passenger_types;
drop table if exists passengers;
drop table if exists news;
drop table if exists questions;

create table roles (
  id int not null auto_increment,
  name char(30) not null,
  
  primary key (id)
)engine=MyISAM;
insert into roles (id, name) values (1, 'user'), (2, 'admin');

create table users (
  id int not null auto_increment,
  login char(255) not null,
  password char(255) not null,
  name char(255),
  surname char(255),
  role_id int not null,
  email char(255),
  
  primary key (id),
  foreign key (role_id) references roles(id) on delete cascade
)engine=MyISAM;
insert into users (id, login, password, name, surname, role_id,email) values (1, 'admin', '', 'Tatjana', 'Kuzmina', 2 ,'tatjana_kuzmina@inbox.lv');

create table flights (
  id int not null auto_increment,
  city_from_id int not null,
  city_to_id int not null,
  date_from date not null,
  time_from varchar(30) not null,
  duration varchar(30) not null,
  plane_id int not null,
  price_economy int not null,
  price_business int not null,
  price_e_child int not null,
  price_b_child int not null,
  price_e_infant int not null,
  price_b_infant int not null,

  primary key (id),
  foreign key (plane_id) references planes(id) on delete cascade,
  foreign key (city_from_id) references cities(id) on delete cascade,
  foreign key (city_to_id) references cities(id) on delete cascade	
)engine=MyISAM;

create table cities (
  id int not null auto_increment,
  name char(255) not null,

  primary key (id)
)engine=MyISAM;

create table planes (
  id int not null auto_increment,
  model char(255) not null,
  seats_economy int not null,
  seats_business int not null,
  luggage_count int not null,

  primary key (id)
) engine=MyISAM;

create table tickets (
  id int not null auto_increment,
  flight_to_id int not null,
  flight_return_id int,
  class_id int not null,

  primary key (id),
  foreign key (flight_to_id) references flights(id) on delete cascade,
  foreign key (flight_return_id) references flights(id) on delete cascade,
  foreign key (class_id) references classes(id) on delete cascade
)engine=MyISAM;

create table classes (
  id int not null auto_increment,
  name char(255) not null,

  primary key (id)
)engine=MyISAM;
insert into classes (id, name) values (1, 'economy');
insert into classes (id, name) values (2,'business');

create table passenger_types (
  id int not null auto_increment,
  name char(255) not null,

  primary key (id)
)engine=MyISAM;
insert into passenger_types (id, name) values (1, 'adult');
insert into passenger_types (id, name) values (2,'child');
insert into passenger_types (id, name) values (3,'infant');

create table passengers (
  id int not null auto_increment,
  ticket_id int not null,
  type_id int not null,
  name char(255) not null,
  surname char(255) not null,
  luggage_count int  not null,
  passport_number char(20) not null,
  issue_date date not null,
  expiration_date date not null,

  primary key (id),
  foreign key (ticket_id) references tickets(id) on delete cascade,
  foreign key (type_id) references passenger_types(id) on delete cascade
)engine=MyISAM;
  
create table news (
  id int not null auto_increment,
  title char(255) not null,
  text text not null,
  user_id int not null,
  created_date datetime not null,
  
  primary key (id),
  foreign key (user_id) references users(id) on delete cascade
)engine=MyISAM;

create table questions(
  id int not null auto_increment,
  name char(255) not null,
  text text not null,
  email char(255),
  created_date datetime not null,

  primary key (id)
)engine=MyISAM;