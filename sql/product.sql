-- ---------------
-- 产品的类型 系统管理员操作，能够添加类型
-- ---------------
drop table if exists ec_product_category;
create table ec_product_category(
  id int(11) primary key auto_increment,
  name varchar(64) not null unique comment '产品类型名',
  create_time varchar(32) not null comment '类型被创建的时间',
  update_time varchar(32) not null comment '类型被修改的时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '产品类型表' auto_increment=1;

-- ------------------
-- 品牌信息表
-- ------------------
drop table if exists ec_product_brand;
create table ec_product_brand(
  id int(11) primary key auto_increment,
  name varchar(64) not null unique comment '品牌名',
  create_time varchar(32) not null comment '创建时间',
  update_time varchar(32) not null comment '修改时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '产品品牌信息' auto_increment=1;

-- ---------------
-- 产品
-- ---------------
drop table if exists ec_product;
create table ec_product(
  id int(11) primary key auto_increment,
  sn varchar(12) unique not null comment '产品的一个唯一的号码',
  name varchar(64) not null comment '产品的名称(是可以重复的)',
  create_time varchar(32) not null comment '产品被创建的时间',
  image varchar(64) not null default '0' comment '产品的图片名称（两个md5的合并）',
  price varchar(32) default '0' comment '产品的价格，当产品不存在规格的时候，价格直接就是产品的价格',
  texture varchar(64) default '' comment '产品的材质',
  barcode varchar(20) not null comment '产品条码',
  user_id int(11) not null comment '用户id',
  shop_id int(11) not null comment '厂家的id',
  brand_id int(11) not null comment '产品的品牌的id',
  tag_id int(11) default '0' comment '标签',     /* 0:流通货 1:尾货*/
  category_id int(11) not null comment '产品的分类id'
  /* 外键约束，暂时不加 */
  /* 条件约束，两个字段不能同时为空 type_id
  constraint chk_type_and_type_custom check(product_type_id is not null or product_type_custom_id is not null)
  */
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '产品基本信息表' auto_increment=1;

-- -------------------
-- 产品的型号
-- -------------------
drop table if exists ec_product_color;
create table ec_product_color(
  id int(11) primary key auto_increment,
  name varchar(64) not null comment '产品颜色',
  image varchar(64) not null comment '图片',
  create_time varchar(32) not null comment '颜色创建时间'
  /*
  product_id int(11) not null,
  foreign key(product_id) references ec_product(id) */
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '产品颜色' auto_increment=1;

-- ----------------
-- 产品的规格
-- ----------------
drop table if exists ec_product_size;
create table ec_product_size(
  id int(11) primary key auto_increment,
  name varchar(64) not null comment '产品的尺寸',
  create_time varchar(32) not null comment '尺寸创建时间'
  /*
  product_id int(11) not null,
  foreign key (product_id) references ec_product(id) */
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT = '尺寸' auto_increment=1;

-- -------------------
-- 产品的价格
-- -------------------
drop table if exists ec_product_price;
create table ec_product_price(
  id int(11) primary key auto_increment,
  discount int(3) not null default '100' comment '折扣',
  in_prime varchar(32) not null default '0' comment '成本价',
  price varchar(32) not null default '0' comment '市场价',
  user_id int(11) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '产品价格表';

-- ----------------------
-- 中间关系表
-- ----------------------
drop table if exists ec_prodcut_relation;
create table ec_product_relation(
  id int(11) primary key auto_increment,
  product_id int(11) not null comment '产品id',
  color_id int(11) not null comment '颜色id',
  size_id int(11) not null comment '尺寸id',
  price_id int(11) not null comment '价格id'
/*
  foreign key(brand_id) references ec_product_brand(id),
  foreign key(product_id) references ec_product(id),
  foreign key(color_id) references ec_product_color(id),
  foreign key(size_id) references ec_product_size(id),
  foreign key(price_id) references ec_product_price(id)*/
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '产品关系对应表';

drop table ec_product_price;
drop table ec_product_size;
drop table ec_product_color;
drop table ec_product;
drop table ec_product_category;
