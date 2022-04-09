CREATE TABLE IF NOT EXISTS Books(
    `bookISBN` VARCHAR(10),
    `bookName` VARCHAR(100),
    `bookAuthor` VARCHAR(50),
    `publisher` VARCHAR(100),
    `year` INT,
    `genreID` INT NOT NULL,
    PRIMARY KEY (`bookISBN`)
);

-- Fantasy
INSERT INTO `Books` VALUES
    ("0747532699", "Harry Potter and the Philosopher's Stone", "J. K. Rowling", "Bloomsbury Publishing", "1997", "2"),
    ("0747538492", "Harry Potter and the Chamber of Secrets", "J. K. Rowling", "Bloomsbury Publishing", "1998", "2"),
    ("0747542155", "Harry Potter and the Prisoner of Azkaban", "J. K. Rowling", "Bloomsbury Publishing", "1999", "2"),
    ("074754624X", "Harry Potter and the Goblet of Fire", "J. K. Rowling", "Bloomsbury Publishing", "2000", "2"),
    ("0747551006", "Harry Potter and the Order of the Phoenix", "J. K. Rowling", "Bloomsbury Publishing", "2003", "2"),
    ("0747581088", "Harry Potter and the Half-Blood Prince", "J. K. Rowling", "Bloomsbury Publishing", "2005", "2"),
    ("0545010225", "Harry Potter and the Deathly Hollows", "J. K. Rowling", "Bloomsbury Publishing", "2007", "2");
    