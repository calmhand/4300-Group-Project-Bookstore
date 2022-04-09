CREATE TABLE IF NOT EXISTS RentedBooks (
    `userID` INT NOT NULL,
    `bookISBN` VARCHAR(10),
    `bookName` VARCHAR(100),
    `bookAuthor` VARCHAR(50),
    `publisher` VARCHAR(100),
    `year` INT,
    `genreID` INT NOT NULL,
    PRIMARY KEY (`userID`)
);