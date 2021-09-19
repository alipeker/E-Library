--------------------------------------------------------
--  File created - Çarþamba-Ocak-03-2018   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for View POPULARBOOK
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARBOOK" ("COUNT", "ITEM") AS 
  select count(*) as count,itemid as item from downloadhistory d inner join book b on d.itemid=b.id group by itemid;
--------------------------------------------------------
--  DDL for View POPULARBOOKQUERY
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARBOOKQUERY" ("COUNT", "ITEM", "ID", "NAME", "RELEASEYEAR", "UPLOADDATE", "SUBJECT", "DIRECTORY") AS 
  select "COUNT","ITEM","ID","NAME","RELEASEYEAR","UPLOADDATE","SUBJECT","DIRECTORY" from popularbook p inner join item i on i.id=p.item  where count in (select max(count) from popularbook);
--------------------------------------------------------
--  DDL for View POPULARCARICATURE
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARCARICATURE" ("COUNT", "ITEM") AS 
  select count(*) as count,itemid as item from downloadhistory d inner join caricature  b on d.itemid=b.id group by itemid;
--------------------------------------------------------
--  DDL for View POPULARCARICATUREQUERY
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARCARICATUREQUERY" ("COUNT", "ITEM", "ID", "NAME", "RELEASEYEAR", "UPLOADDATE", "SUBJECT", "DIRECTORY") AS 
  select "COUNT","ITEM","ID","NAME","RELEASEYEAR","UPLOADDATE","SUBJECT","DIRECTORY" from popularcaricature p inner join item i on i.id=p.item  where count in (select max(count) from popularcaricature);
--------------------------------------------------------
--  DDL for View POPULARITEM
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARITEM" ("COUNT", "ITEMID") AS 
  select count(*) as count, itemid from downloadhistory group by itemid order by count(*) desc;
--------------------------------------------------------
--  DDL for View POPULARITEMEND
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARITEMEND" ("COUNT", "ITEMID", "ID", "NAME", "RELEASEYEAR", "UPLOADDATE", "SUBJECT", "DIRECTORY") AS 
  select "COUNT","ITEMID","ID","NAME","RELEASEYEAR","UPLOADDATE","SUBJECT","DIRECTORY" from popularitem p inner join item i on p.itemid=i.id;
--------------------------------------------------------
--  DDL for View POPULARWALLPAPER
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARWALLPAPER" ("COUNT", "ITEM") AS 
  select count(*) as count,itemid as item from downloadhistory d inner join wallpaper b on d.itemid=b.id group by itemid;
--------------------------------------------------------
--  DDL for View POPULARWALLPAPERQUERY
--------------------------------------------------------

  CREATE OR REPLACE FORCE EDITIONABLE VIEW "B21427291"."POPULARWALLPAPERQUERY" ("COUNT", "ITEM", "ID", "NAME", "RELEASEYEAR", "UPLOADDATE", "SUBJECT", "DIRECTORY") AS 
  select "COUNT","ITEM","ID","NAME","RELEASEYEAR","UPLOADDATE","SUBJECT","DIRECTORY" from popularwallpaper p inner join item i on i.id=p.item  where count in (select max(count) from popularwallpaper);
