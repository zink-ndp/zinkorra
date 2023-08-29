/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     24/08 1:42                                   */
/*==============================================================*/


drop table if exists BILL;

drop table if exists BILL_DETAIL;

drop table if exists CART_DETAIL;

drop table if exists CUSTOMMER;

drop table if exists IB_DETAIL;

drop table if exists IMPORT_BILL;

drop table if exists INTERIOR;

drop table if exists PAYMENT;

drop table if exists PRODUCTS;

drop table if exists RATE;

drop table if exists ROLE;

drop table if exists SALE;

drop table if exists STAFF;

drop table if exists STATUS;

drop table if exists TYPE;

/*==============================================================*/
/* Table: BILL                                                  */
/*==============================================================*/
create table BILL
(
   B_ID                 int not null,
   ST_ID                int not null,
   PM_ID                int not null,
   STF_ID               int not null,
   CTM_ID               int,
   SL_CODE              char(20),
   B_TOTAL              int not null,
   B_DATE               date not null,
   primary key (B_ID)
);

/*==============================================================*/
/* Table: BILL_DETAIL                                           */
/*==============================================================*/
create table BILL_DETAIL
(
   B_ID                 int not null,
   PD_ID                int not null,
   PD_QUANT             numeric(8,0) not null,
   primary key (B_ID, PD_ID)
);

/*==============================================================*/
/* Table: CART_DETAIL                                           */
/*==============================================================*/
create table CART_DETAIL
(
   CTM_ID               int not null,
   PD_ID                int not null,
   PD_QUANT             numeric(8,0) not null,
   primary key (CTM_ID, PD_ID)
);

/*==============================================================*/
/* Table: CUSTOMMER                                             */
/*==============================================================*/
create table CUSTOMMER
(
   CTM_ID               int not null,
   CTM_NAME             char(50) not null,
   CTM_PHONE            char(10) not null,
   CTM_EMAIL            char(50) not null,
   CTM_PASS             char(50) not null,
   CTM_AVT              text,
   primary key (CTM_ID)
);

/*==============================================================*/
/* Table: IB_DETAIL                                             */
/*==============================================================*/
create table IB_DETAIL
(
   PD_ID                int not null,
   IB_ID                int not null,
   PD_QUANT             numeric(8,0) not null,
   primary key (PD_ID, IB_ID)
);

/*==============================================================*/
/* Table: IMPORT_BILL                                           */
/*==============================================================*/
create table IMPORT_BILL
(
   IB_ID                int not null,
   STF_ID               int not null,
   IB_DATE              date not null,
   primary key (IB_ID)
);

/*==============================================================*/
/* Table: INTERIOR                                              */
/*==============================================================*/
create table INTERIOR
(
   ITR_ID               int not null,
   ITR_NAME             char(50) not null,
   primary key (ITR_ID)
);

/*==============================================================*/
/* Table: PAYMENT                                               */
/*==============================================================*/
create table PAYMENT
(
   PM_ID                int not null,
   PM_NAME              char(50) not null,
   primary key (PM_ID)
);

/*==============================================================*/
/* Table: PRODUCTS                                              */
/*==============================================================*/
create table PRODUCTS
(
   PD_ID                int not null,
   ITR_ID               int not null,
   TY_ID                int not null,
   PD_NAME              char(50) not null,
   PD_PRICE             int not null,
   PD_DESCRI            text not null,
   PD_PIC               text,
   PD_QUANT             numeric(8,0) not null,
   primary key (PD_ID)
);

/*==============================================================*/
/* Table: RATE                                                  */
/*==============================================================*/
create table RATE
(
   R_ID                 int not null,
   CTM_ID               int not null,
   PD_ID                int not null,
   R_TITLE              char(50) not null,
   R_STAR               numeric(8,0) not null,
   R_COMMENT            text not null,
   primary key (R_ID)
);

/*==============================================================*/
/* Table: ROLE                                                  */
/*==============================================================*/
create table ROLE
(
   RO_ID                int not null,
   RO_NAME              char(50) not null,
   primary key (RO_ID)
);

/*==============================================================*/
/* Table: SALE                                                  */
/*==============================================================*/
create table SALE
(
   SL_CODE              char(20) not null,
   SL_PERCENT           numeric(8,0) not null,
   SL_START_DATE        date not null,
   SL_END_DATE          date not null,
   primary key (SL_CODE)
);

/*==============================================================*/
/* Table: STAFF                                                 */
/*==============================================================*/
create table STAFF
(
   STF_ID               int not null,
   RO_ID                int not null,
   STF_NAME             char(50) not null,
   STF_GENDER           char(1) not null,
   STF_PHONE            char(10) not null,
   STF_EMAIL            char(50),
   STF_PASS             char(50),
   STF_AVT              text,
   primary key (STF_ID)
);

/*==============================================================*/
/* Table: STATUS                                                */
/*==============================================================*/
create table STATUS
(
   ST_ID                int not null,
   ST_NAME              char(50) not null,
   primary key (ST_ID)
);

/*==============================================================*/
/* Table: TYPE                                                  */
/*==============================================================*/
create table TYPE
(
   TY_ID                int not null,
   TY_NAME              char(30) not null,
   primary key (TY_ID)
);

alter table BILL add constraint FK_APDUNG foreign key (SL_CODE)
      references SALE (SL_CODE) on delete restrict on update restrict;

alter table BILL add constraint FK_COMFIRM foreign key (STF_ID)
      references STAFF (STF_ID) on delete restrict on update restrict;

alter table BILL add constraint FK_RELATIONSHIP_12 foreign key (CTM_ID)
      references CUSTOMMER (CTM_ID) on delete restrict on update restrict;

alter table BILL add constraint FK_RELATIONSHIP_6 foreign key (ST_ID)
      references STATUS (ST_ID) on delete restrict on update restrict;

alter table BILL add constraint FK_RELATIONSHIP_7 foreign key (PM_ID)
      references PAYMENT (PM_ID) on delete restrict on update restrict;

alter table BILL_DETAIL add constraint FK_RELATIONSHIP_11 foreign key (PD_ID)
      references PRODUCTS (PD_ID) on delete restrict on update restrict;

alter table BILL_DETAIL add constraint FK_RELATIONSHIP_13 foreign key (B_ID)
      references BILL (B_ID) on delete restrict on update restrict;

alter table CART_DETAIL add constraint FK_RELATIONSHIP_4 foreign key (PD_ID)
      references PRODUCTS (PD_ID) on delete restrict on update restrict;

alter table CART_DETAIL add constraint FK_RELATIONSHIP_5 foreign key (CTM_ID)
      references CUSTOMMER (CTM_ID) on delete restrict on update restrict;

alter table IB_DETAIL add constraint FK_RELATIONSHIP_17 foreign key (IB_ID)
      references IMPORT_BILL (IB_ID) on delete restrict on update restrict;

alter table IB_DETAIL add constraint FK_RELATIONSHIP_18 foreign key (PD_ID)
      references PRODUCTS (PD_ID) on delete restrict on update restrict;

alter table IMPORT_BILL add constraint FK_RELATIONSHIP_16 foreign key (STF_ID)
      references STAFF (STF_ID) on delete restrict on update restrict;

alter table PRODUCTS add constraint FK_RELATIONSHIP_14 foreign key (ITR_ID)
      references INTERIOR (ITR_ID) on delete restrict on update restrict;

alter table PRODUCTS add constraint FK_RELATIONSHIP_15 foreign key (TY_ID)
      references TYPE (TY_ID) on delete restrict on update restrict;

alter table RATE add constraint FK_RATE foreign key (CTM_ID)
      references CUSTOMMER (CTM_ID) on delete restrict on update restrict;

alter table RATE add constraint FK_RATED foreign key (PD_ID)
      references PRODUCTS (PD_ID) on delete restrict on update restrict;

alter table STAFF add constraint FK_RELATIONSHIP_9 foreign key (RO_ID)
      references ROLE (RO_ID) on delete restrict on update restrict;

