CREATE TABLE `Users` (
    `userID` INT NOT NULL AUTO_INCREMENT,
    `userName` VARCHAR(255),
    `userLast` VARCHAR(255) NOT NULL,
    `userPass` VARCHAR(255),
    `userEmail` VARCHAR(255),
    `userCell` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`userID`)
);