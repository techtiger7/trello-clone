DROP SCHEMA boards CASCADE;

CREATE SCHEMA boards;

CREATE TABLE IF NOT EXISTS boards.users (
  id  bigserial PRIMARY KEY,
  email  text,
  first_name  text,
  last_name  text,
  date_of_birth  date,
  hash  text,
  salt  text,
  created  timestamp
);

CREATE TABLE IF NOT EXISTS boards.boards (
  id  bigserial PRIMARY KEY,
  title  text,
  description  text
);

CREATE TABLE IF NOT EXISTS boards.user_boards (
  user_id  bigserial REFERENCES boards.users(id),
  board_id  bigserial REFERENCES boards.boards(id),
  allocated  timestamp,
  PRIMARY KEY (user_id, board_id)
);

CREATE TABLE IF NOT EXISTS boards.lists (
  id  bigserial PRIMARY KEY,
  name  text
);

CREATE TABLE IF NOT EXISTS boards.board_lists (
  board_id  bigserial REFERENCES boards.boards(id),
  list_id  bigserial REFERENCES boards.lists(id),
  PRIMARY KEY (board_id, list_id)
);

CREATE TABLE IF NOT EXISTS boards.tasks (
  id  bigserial PRIMARY KEY,
  title  text,
  description  text,
  date_start  timestamp,
  date_finish  timestamp
);

CREATE TABLE IF NOT EXISTS boards.list_tasks (
  list_id  bigserial REFERENCES boards.lists(id),
  task_id  bigserial REFERENCES boards.tasks(id),
  PRIMARY KEY (list_id, task_id)
);

CREATE TABLE IF NOT EXISTS boards.user_tasks (
  user_id  bigserial REFERENCES boards.users(id),
  task_id  bigserial REFERENCES boards.tasks(id),
  commenced  timestamp,
  finished  timestamp,
  PRIMARY KEY (user_id, task_id)
);
