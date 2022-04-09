CREATE TABLE IF NOT EXISTS Genre (
    `genreName` VARCHAR(25),
    `genreID` INT,
    PRIMARY KEY (`genreID`)
);

INSERT INTO `Genre` VALUES 
    ("Textbooks", "1"),
    ("Fiction", "2"),
    ("NonFiction", "3"),
    ("Comics", "4");