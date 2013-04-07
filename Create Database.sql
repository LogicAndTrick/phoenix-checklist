CREATE TABLE IF NOT EXISTS Users (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Email VARCHAR(128) NOT NULL,
    OpenID VARCHAR(512) NOT NULL,
    Cookie VARCHAR(256) NOT NULL
);

CREATE TABLE IF NOT EXISTS Checklists (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    Title VARCHAR(512) NOT NULL,
    Created DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS ChecklistItems (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ChecklistID INT NOT NULL,
    Text TEXT NOT NULL,
    IsChecked TINYINT NOT NULL,
    OrderIndex INTEGER NOT NULL,
    Created DATETIME NOT NULL
);

