ALTER TABLE articles
    ADD COLUMN status tinyint DEFAULT 1 
    AFTER body;


CREATE TABLE