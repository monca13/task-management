create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255) not null,
    email             varchar(255) not null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    role              varchar(255) not null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

create table tasks
(
    id          bigint unsigned auto_increment
        primary key,
    task_number varchar(30)     not null,
    title       varchar(255)    not null,
    description text            not null,
    status      varchar(255)    not null,
    user_id     bigint unsigned null,
    created_by  bigint unsigned null,
    updated_by  bigint unsigned null,
    deleted_by  bigint unsigned null,
    created_at  timestamp       null,
    updated_at  timestamp       null,
    deleted_at  timestamp       null,
    constraint tasks_created_by_foreign
        foreign key (created_by) references users (id),
    constraint tasks_deleted_by_foreign
        foreign key (deleted_by) references users (id),
    constraint tasks_updated_by_foreign
        foreign key (updated_by) references users (id),
    constraint tasks_user_id_foreign
        foreign key (user_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

create index tasks_created_by_index
    on tasks (created_by);

create index tasks_deleted_by_index
    on tasks (deleted_by);

create index tasks_updated_by_index
    on tasks (updated_by);


