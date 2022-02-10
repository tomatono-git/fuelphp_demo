CREATE TABLE IF NOT EXISTS public.todos
(
    id serial,
    title character varying(200) NOT NULL,
    comment text NULL,
    due_date timestamp(6) without time zone NULL,
    state int NOT NULL DEFAULT 0,
    created_at timestamp(6) without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_user integer NOT NULL,
    updated_at timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_user integer,
    CONSTRAINT todos_pkey PRIMARY KEY (id)
)
;

CREATE TABLE IF NOT EXISTS public.todo_tags
(
    id serial,
    tag character varying(200) NOT NULL,
    created_at timestamp(6) without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_user integer NOT NULL,
    updated_at timestamp(6) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_user integer,
    CONSTRAINT todo_tags_pkey PRIMARY KEY (id)
)
;
