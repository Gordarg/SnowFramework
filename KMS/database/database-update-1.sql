ALTER TABLE `posts` 
ADD COLUMN `Type` CHAR(5) NOT NULL DEFAULT 'POST' AFTER `Submit`;