create database nothing charset utf8;

--地区表省市县
create table area (
	id varchar(64),
	area_code varchar(32),
	area_name varchar(256),
	parent_id varchar(64),
	create_time timestamp,
	update_time timestamp,
	primary key(id)
);

--各个办事部门列表
create table depart (
	id varchar(64),
	depart_code varchar(32),
	depart_name varchar(256),
	parent_id varchar(64),
	create_time timestamp,
	update_time timestamp,
	primary key(id)
);

--每个地区的办事部门
create table area_depart(
	id varchar(64),
	area_id varchar(64),
	depart_id varchar(64),
	create_time timestamp,
	update_time timestamp,
	primary key (id)
);

--各个地区办事部门的职能
create table depart_function (
	id varchar(64),
	area_depart_id varchar(64),
	function_name varchar(1024),
	locks char(1),
	create_time timestamp,
	update_time timestamp,
	primary key (id)
);

--各个地区办事部门职能的具体办事要求
create table depart_function_file (
	id varchar(64),
	depart_function_id varchar(64),
	file_name varchar(1024),
	primary key (id)
);

create table depart_function_hst (
	id varchar(64),
	depart_function_id varchar(64),
	area_depart_id varchar(64),
	function_name varchar(1024),
	locks char(1),
	create_time timestamp,
	update_time timestamp,
	primary key (id)
);

create table depart_function_file_hst (
	id varchar(64),
	depart_function_hst_id varchar(64),
	file_name varchar(1024),
	primary key (id)
);