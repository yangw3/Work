CREATE TABLE `users`(
    `rin` INT(9) NOT NULL AUTO_INCREMENT,
    `rcsid` VARCHAR(7) NOT NULL,
    PRIMARY KEY (`rcsid`)
);

CREATE TABLE `posts`(
    `postId` int(10) NOT NULL AUTO_INCREMENT,
    `posts` VARCHAR(10000) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `date` TIMESTAMP NOT NULL,
    `rin` VARCHAR(7) NOT NULL,
    `tags` VARCHAR(10),
    PRIMARY KEY(`postId`)
    FOREIGN KEY (`tags`) REFERENCES `tags`(`tag`),
    FOREIGN KEY (`rin`) REFERENCES `users`(`rin`)
);

CREATE TABLE `tags`(
    `tag` VARCHAR(100) NOT NULL,
    `postId` int(10) NOT NULL,
    PRIMARY KEY(`tag`),
    FOREIGN KEY (`postId`) REFERENCES posts(`postId`)
);

CREATE TABLE `reports`(
    `reportId` int(10) NOT NULL AUTO_INCREMENT,
    `postId` int(10) NOT NULL,
    `report` VARCHAR(255),
    PRIMARY KEY (`reportId`),
    FOREIGN KEY (`postId`) REFERENCES posts(`postId`)
);

Create TABLE `comments` (
    `commentId` int(10) NOT NULL AUTO_INCREMENT,
    `postId` int(10) NOT NULL,
    `comment` VARCHAR(10000) NOT NULL,
    PRIMARY KEY (`commentId`),
    FOREIGN KEY (`postId`) REFERENCES posts(`postId`)
);

ALTER TABLE `posts` ADD(
    FOREIGN KEY (`tags`) REFERENCES tags(`tag`),
    FOREIGN KEY (`rcsid`) REFERENCES users(`rcsid`)
);

ALTER TABLE `tags` (
    FOREIGN KEY (postId) REFERENCES posts(postId)
)

ALTER TABLE `reports` (
    FOREIGN KEY (postId) REFERENCES posts(postId)
);


CREATE TABLE `users`(
    `rin` INT(9) NOT NULL,
    `rcsid` VARCHAR(7) NOT NULL,
    PRIMARY KEY (`rcsid`)
);