CREATE TABLE `Users` (
  `user_id` integer,
  `email` string,
  `password` string,
  `full_name` string,
  `account_type` integer
);

CREATE TABLE `Projects` (
  `project_id` integer,
  `project_name` string,
  `admin_id` integer,
  `background_id` integer
);

CREATE TABLE `Members` (
  `member_id` integer,
  `projects_id` integer,
  `task_id` integer
);

CREATE TABLE `Tasks` (
  `task_id` integer,
  `project_id` integer,
  `task_label` string,
  `members` table
);

CREATE TABLE `Backgrounds` (
  `background_id` integer,
  `color` string
);

ALTER TABLE `Projects` ADD FOREIGN KEY (`project_id`) REFERENCES `Members` (`projects_id`);

ALTER TABLE `Members` ADD FOREIGN KEY (`member_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Projects` ADD FOREIGN KEY (`project_id`) REFERENCES `Tasks` (`project_id`);

ALTER TABLE `Backgrounds` ADD FOREIGN KEY (`background_id`) REFERENCES `Projects` (`background_id`);

ALTER TABLE `Tasks` ADD FOREIGN KEY (`task_id`) REFERENCES `Members` (`task_id`);
