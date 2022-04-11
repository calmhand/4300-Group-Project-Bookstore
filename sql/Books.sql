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
    ("0747532699", "Harry Potter and the Philosopher's Stone", "J. K. Rowling", "Scholastic", "1997", "2"),
    ("0747538492", "Harry Potter and the Chamber of Secrets", "J. K. Rowling", "Scholastic", "1998", "2"),
    ("0747542155", "Harry Potter and the Prisoner of Azkaban", "J. K. Rowling", "Scholastic", "1999", "2"),
    ("074754624X", "Harry Potter and the Goblet of Fire", "J. K. Rowling", "Scholastic", "2000", "2"),
    ("0747551006", "Harry Potter and the Order of the Phoenix", "J. K. Rowling", "Scholastic", "2003", "2"),
    ("0747581088", "Harry Potter and the Half-Blood Prince", "J. K. Rowling", "Scholastic", "2005", "2"),
    ("0545010225", "Harry Potter and the Deathly Hollows", "J. K. Rowling", "Scholastic", "2007", "2");

-- Non-Fiction

INSERT INTO `Books` VALUES
    ("014017897X", "Essays", "Michel de Montaigne", "Penguin Books", "1993", "3"),
    ("0664230806", "Confessions & Enchiridion", "Augustine", "Westminster John Knox Press", "2006", "3");


-- Textbooks
INSERT INTO `Books` VALUES
    ("0393928209", "America: A Narrative History (Seventh Edition) (Vol. 1)", "David E. Shi, George Brown Tindall", "W. W. Norton & Company", "2006", "1");


    