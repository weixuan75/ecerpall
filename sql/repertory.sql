/* 库存表 */
drop table if exists ec_repertory;
create table ec_repertory(
  id int(11) primary key auto_increment,

  count int(11) default 0 comment '库存数量',

  product_id int(11) not null comment '产品id',
  color_id int(11) not null comment '颜色id',
  size_id int(11) not null comment '尺寸id'
  /* 外键约束，暂时不写 */
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '产品库存';
