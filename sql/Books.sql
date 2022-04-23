CREATE TABLE IF NOT EXISTS `Books`(
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
    ("0553213105", "Pride and Prejudice", "Jane Austen", "Public Domain", "1813", "2"),
    ("0141439475", "Frankenstein", "Mary Wollstonecraft Shelly", "Public Domain", "1818", "2"),
    ("0393970124", "Dracula", "Bram Stoker", "Public Domain", "1847", "2"),
    ("0812505042", "The Time Machine", "H.G. Wells", "Public Domain", "1895", "2"),
    ("1953649807", "The Adventures of Huckleberry Finn", "Mark Twain", "Public Domain", "1884", "2"),
    ("0140449264", "The Count of Monte Cristo", "Alexandre Dumas", "Public Domain", "1844", "2"),
    ("0141439602", "A Tale of Two Cities", "Charles Dickens", "Public Domain", "1859", "2"),
    ("1593080662", "Les Misérables", "Victor Hugo", "Public Domain", "1862", "2"),
    ("0143039954", "Odyssey", "Homer", "Public Domain", "800", "2"),
    ("0743273567", "The Great Gatsby", "F. Scott Fitzgerald", "Public Domain", "1925", "2");
    

-- Non-Fiction

INSERT INTO `Books` VALUES
    ("0762415983", "The Art of War", "Sun Tzu", "Public Domain", "500", "3"),
    ("067003469X", "War and Peace", "Leo Tolstoy", "Public Domain", "1869", "3"),
    ("0140431950", "The Leviathan", "Thomas Hobbes", "Public Domain", "1651", "3"),
    ("0553213695", "Metamorphosis", "Franz Kafka", "Public Domain", "1915", "3"),
    ("0717802418", "The Communist Manifesto", "Karl Marx", "Public Domain", "1848", "3");


--Philosophy
INSERT INTO `Books` VALUES
    ("0140446362", "Poetics", "Aristotle", "Public Domain", "330", "1"),
    ("0872204642", "Nicomachean Ethics", "Aristotle", "Public Domain", "340", "1"),
    ("0679601759", "Thus Spoke Zarathustra", "Friedrich Wilhelm Nietzsche", "Public Domain", "1883", "1"),
    ("0140449140", "The Republic", "Plato", "Public Domain", "375", "3"),
    ("048629868X", "Beyond Good and Evil", "Friedrich Wilhelm Nietzsche", "Public Domain", "1886", "1");
    


    