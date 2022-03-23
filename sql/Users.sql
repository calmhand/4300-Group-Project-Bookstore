CREATE TABLE `Users` (
    `userID` INT NOT NULL AUTO_INCREMENT,
    `userName` VARCHAR(255),
    `userLast` VARCHAR(255) NOT NULL,
    `userPass` VARCHAR(255),
    `userEmail` VARCHAR(255),
    `userCell` INT NOT NULL,
    PRIMARY KEY (`userID`)
);

INSERT INTO `Users` VALUES 
('1217', 'Johnny', 'Admin', 'alex1217', 'jmg49760@uga.edu', 1234567890);