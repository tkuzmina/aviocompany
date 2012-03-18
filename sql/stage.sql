drop table if exists roles;
drop table if exists users;
drop table if exists flights;
drop table if exists cities;
drop table if exists planes;
drop table if exists tickets;
drop table if exists classes;
drop table if exists passengers;
drop table if exists news;
drop table if exists comments;

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
  datetime_from datetime not null,
  datetime_to datetime not null,
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
  flight_id int not null,
  class_id int not null,

  primary key (id),
  foreign key (flight_id) references flights(id) on delete cascade,
  foreign key (class_id) references classes(id) on delete cascade
)engine=MyISAM;

create table classes (
  id int not null auto_increment,
  name char(255) not null,

  primary key (id)
)engine=MyISAM;
insert into classes (id, name) values (1, 'economy');
insert into classes (id, name) values (2,'business');

create table passengers (
  id int not null auto_increment,
  ticket_id int not null,
  name char(255) not null,
  surname char(255) not null,
  child boolean,
  luggage_count int,
  passport_int char(20),
  telephone char(30) not null,
  
  primary key (id),
  foreign key (ticket_id) references tickets(id) on delete cascade
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
  
create table comments (
  id int not null auto_increment,
  news_id int not null,
  text text not null,
  user_id int not null,
  created_date datetime not null,
  
  primary key (id),
  foreign key (user_id) references users(id) on delete cascade,
  foreign key (news_id) references news(id) on delete cascade 
)engine=MyISAM;