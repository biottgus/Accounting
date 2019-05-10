--
-- PostgreSQL database dump
--

-- Dumped from database version 10.7 (Ubuntu 10.7-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.7 (Ubuntu 10.7-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: account_transactions; Type: TABLE; Schema: public; Owner: usertest
--

CREATE TABLE public.account_transactions (
    id_account_transactions bigint NOT NULL,
    datetime_account_transactions timestamp without time zone DEFAULT now() NOT NULL,
    date_account_transactioins date DEFAULT now(),
    id_account bigint NOT NULL,
    value_account_transactions double precision DEFAULT 0,
    id_currency bigint NOT NULL,
    concept_account_transactions character varying,
    document_account_transactions character varying,
    id_users integer NOT NULL
);


ALTER TABLE public.account_transactions OWNER TO usertest;

--
-- Name: account_transactions_id_account_transactions_seq; Type: SEQUENCE; Schema: public; Owner: usertest
--

CREATE SEQUENCE public.account_transactions_id_account_transactions_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_transactions_id_account_transactions_seq OWNER TO usertest;

--
-- Name: account_transactions_id_account_transactions_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usertest
--

ALTER SEQUENCE public.account_transactions_id_account_transactions_seq OWNED BY public.account_transactions.id_account_transactions;


--
-- Name: account_types; Type: TABLE; Schema: public; Owner: usertest
--

CREATE TABLE public.account_types (
    id_account_types bigint NOT NULL,
    name_account_types character varying,
    type_account_types integer DEFAULT '-1'::integer
);


ALTER TABLE public.account_types OWNER TO usertest;

--
-- Name: account_types_id_account_types_seq; Type: SEQUENCE; Schema: public; Owner: usertest
--

CREATE SEQUENCE public.account_types_id_account_types_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_types_id_account_types_seq OWNER TO usertest;

--
-- Name: account_types_id_account_types_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usertest
--

ALTER SEQUENCE public.account_types_id_account_types_seq OWNED BY public.account_types.id_account_types;


--
-- Name: accounts; Type: TABLE; Schema: public; Owner: usertest
--

CREATE TABLE public.accounts (
    id_accounts bigint NOT NULL,
    name_accounts character varying,
    id_account_types bigint
);


ALTER TABLE public.accounts OWNER TO usertest;

--
-- Name: accounts_id_accounts_seq; Type: SEQUENCE; Schema: public; Owner: usertest
--

CREATE SEQUENCE public.accounts_id_accounts_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.accounts_id_accounts_seq OWNER TO usertest;

--
-- Name: accounts_id_accounts_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usertest
--

ALTER SEQUENCE public.accounts_id_accounts_seq OWNED BY public.accounts.id_accounts;


--
-- Name: currencies; Type: TABLE; Schema: public; Owner: usertest
--

CREATE TABLE public.currencies (
    id_currency bigint NOT NULL,
    name_currency character varying,
    iso_currency character varying,
    default_currency integer DEFAULT 0,
    exchange_currency double precision
);


ALTER TABLE public.currencies OWNER TO usertest;

--
-- Name: currencies_id_currency_seq; Type: SEQUENCE; Schema: public; Owner: usertest
--

CREATE SEQUENCE public.currencies_id_currency_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.currencies_id_currency_seq OWNER TO usertest;

--
-- Name: currencies_id_currency_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usertest
--

ALTER SEQUENCE public.currencies_id_currency_seq OWNED BY public.currencies.id_currency;


--
-- Name: payments_calendar; Type: TABLE; Schema: public; Owner: usertest
--

CREATE TABLE public.payments_calendar (
    id_payments_calendar bigint NOT NULL,
    date_payments_calendar date DEFAULT now() NOT NULL,
    id_account bigint NOT NULL,
    id_users integer NOT NULL
);


ALTER TABLE public.payments_calendar OWNER TO usertest;

--
-- Name: payments_calendar_id_payments_calendar_seq; Type: SEQUENCE; Schema: public; Owner: usertest
--

CREATE SEQUENCE public.payments_calendar_id_payments_calendar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.payments_calendar_id_payments_calendar_seq OWNER TO usertest;

--
-- Name: payments_calendar_id_payments_calendar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usertest
--

ALTER SEQUENCE public.payments_calendar_id_payments_calendar_seq OWNED BY public.payments_calendar.id_payments_calendar;


--
-- Name: users; Type: TABLE; Schema: public; Owner: usertest
--

CREATE TABLE public.users (
    id_users integer NOT NULL,
    name_users character varying,
    login_users character varying,
    passwd_users character varying,
    mail_users character varying
);


ALTER TABLE public.users OWNER TO usertest;

--
-- Name: users_id_users_seq; Type: SEQUENCE; Schema: public; Owner: usertest
--

CREATE SEQUENCE public.users_id_users_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_users_seq OWNER TO usertest;

--
-- Name: users_id_users_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: usertest
--

ALTER SEQUENCE public.users_id_users_seq OWNED BY public.users.id_users;


--
-- Name: view_accounts; Type: VIEW; Schema: public; Owner: usertest
--

CREATE VIEW public.view_accounts AS
 SELECT a.id_accounts,
    a.name_accounts,
    a.id_account_types,
    b.name_account_types,
    b.type_account_types
   FROM (public.accounts a
     LEFT JOIN public.account_types b ON ((b.id_account_types = a.id_account_types)));


ALTER TABLE public.view_accounts OWNER TO usertest;

--
-- Name: account_transactions id_account_transactions; Type: DEFAULT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_transactions ALTER COLUMN id_account_transactions SET DEFAULT nextval('public.account_transactions_id_account_transactions_seq'::regclass);


--
-- Name: account_types id_account_types; Type: DEFAULT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_types ALTER COLUMN id_account_types SET DEFAULT nextval('public.account_types_id_account_types_seq'::regclass);


--
-- Name: accounts id_accounts; Type: DEFAULT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.accounts ALTER COLUMN id_accounts SET DEFAULT nextval('public.accounts_id_accounts_seq'::regclass);


--
-- Name: currencies id_currency; Type: DEFAULT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.currencies ALTER COLUMN id_currency SET DEFAULT nextval('public.currencies_id_currency_seq'::regclass);


--
-- Name: payments_calendar id_payments_calendar; Type: DEFAULT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.payments_calendar ALTER COLUMN id_payments_calendar SET DEFAULT nextval('public.payments_calendar_id_payments_calendar_seq'::regclass);


--
-- Name: users id_users; Type: DEFAULT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.users ALTER COLUMN id_users SET DEFAULT nextval('public.users_id_users_seq'::regclass);


--
-- Data for Name: account_transactions; Type: TABLE DATA; Schema: public; Owner: usertest
--

COPY public.account_transactions (id_account_transactions, datetime_account_transactions, date_account_transactioins, id_account, value_account_transactions, id_currency, concept_account_transactions, document_account_transactions, id_users) FROM stdin;
1	2019-05-10 10:32:25.513574	2019-05-10	1	35000	1	Sueldo MDG	\N	1
2	2019-05-10 10:32:55.155333	2019-05-10	1	72000	1	Sueldo parte dolares MDG 1600	\N	1
\.


--
-- Data for Name: account_types; Type: TABLE DATA; Schema: public; Owner: usertest
--

COPY public.account_types (id_account_types, name_account_types, type_account_types) FROM stdin;
1	SUELDOS	1
2	INGRESOS	1
3	TARJETAS	-1
4	IMPUESTOS	-1
5	SERVICIOS	-1
6	GASTOS	-1
7	EXPENSAS	-1
8	PRESTAMOS OUT	-1
9	PRESTAMOS IN	1
\.


--
-- Data for Name: accounts; Type: TABLE DATA; Schema: public; Owner: usertest
--

COPY public.accounts (id_accounts, name_accounts, id_account_types) FROM stdin;
1	SUELDO MDG	1
2	SUELDO DECTRA	1
3	OTROS INGRESOS	2
4	TARJETA CREDITO VISA SANTANDER	3
5	TARJETA CREDITO AMEX SANTANDER	3
6	TARJETA CREDITO VISA BBVA	3
7	TARJETA CREDITO MASTER BBVA	3
8	TARJETA CREDITO MASTER MERCADOPAGO	3
9	EXPENSAS SANTOS DUMONT	7
10	T.ROJA SERVICIOS	5
11	T.ROJA IMPUESTOS	4
12	DEL VISO	6
13	JUAN.SANTI	6
14	JUAN.CLUB	6
15	JUAN.EXTRAS	6
16	KUMON	6
17	HOLOS	6
18	BBVA CREDITO	6
19	VIAJES	6
20	SUPERMERCADO	6
21	AUTO/MOTO	6
22	ALQUILER COCHERA	6
23	COBRO PRESTAMO	9
24	PRESTAMOS	8
\.


--
-- Data for Name: currencies; Type: TABLE DATA; Schema: public; Owner: usertest
--

COPY public.currencies (id_currency, name_currency, iso_currency, default_currency, exchange_currency) FROM stdin;
3	Euros	EUR	0	1.19999999999999996
1	Pesos Argentinos	ARS	1	45
2	Dólares	USD	0	1
\.


--
-- Data for Name: payments_calendar; Type: TABLE DATA; Schema: public; Owner: usertest
--

COPY public.payments_calendar (id_payments_calendar, date_payments_calendar, id_account, id_users) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: usertest
--

COPY public.users (id_users, name_users, login_users, passwd_users, mail_users) FROM stdin;
1	Admin	admin	sogtulakk	
\.


--
-- Name: account_transactions_id_account_transactions_seq; Type: SEQUENCE SET; Schema: public; Owner: usertest
--

SELECT pg_catalog.setval('public.account_transactions_id_account_transactions_seq', 2, true);


--
-- Name: account_types_id_account_types_seq; Type: SEQUENCE SET; Schema: public; Owner: usertest
--

SELECT pg_catalog.setval('public.account_types_id_account_types_seq', 9, true);


--
-- Name: accounts_id_accounts_seq; Type: SEQUENCE SET; Schema: public; Owner: usertest
--

SELECT pg_catalog.setval('public.accounts_id_accounts_seq', 24, true);


--
-- Name: currencies_id_currency_seq; Type: SEQUENCE SET; Schema: public; Owner: usertest
--

SELECT pg_catalog.setval('public.currencies_id_currency_seq', 3, true);


--
-- Name: payments_calendar_id_payments_calendar_seq; Type: SEQUENCE SET; Schema: public; Owner: usertest
--

SELECT pg_catalog.setval('public.payments_calendar_id_payments_calendar_seq', 1, false);


--
-- Name: users_id_users_seq; Type: SEQUENCE SET; Schema: public; Owner: usertest
--

SELECT pg_catalog.setval('public.users_id_users_seq', 1, true);


--
-- Name: account_transactions account_transactions_pkey; Type: CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_transactions
    ADD CONSTRAINT account_transactions_pkey PRIMARY KEY (id_account_transactions);


--
-- Name: account_types account_types_pkey; Type: CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_types
    ADD CONSTRAINT account_types_pkey PRIMARY KEY (id_account_types);


--
-- Name: accounts accounts_pkey; Type: CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.accounts
    ADD CONSTRAINT accounts_pkey PRIMARY KEY (id_accounts);


--
-- Name: currencies currencies_pkey; Type: CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.currencies
    ADD CONSTRAINT currencies_pkey PRIMARY KEY (id_currency);


--
-- Name: payments_calendar payments_calendar_pkey; Type: CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.payments_calendar
    ADD CONSTRAINT payments_calendar_pkey PRIMARY KEY (id_payments_calendar);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_users);


--
-- Name: account_transactions fk_account_transactions_id_account; Type: FK CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_transactions
    ADD CONSTRAINT fk_account_transactions_id_account FOREIGN KEY (id_account) REFERENCES public.accounts(id_accounts);


--
-- Name: account_transactions fk_account_transactions_id_currency; Type: FK CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_transactions
    ADD CONSTRAINT fk_account_transactions_id_currency FOREIGN KEY (id_currency) REFERENCES public.currencies(id_currency);


--
-- Name: account_transactions fk_account_transactions_id_users; Type: FK CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.account_transactions
    ADD CONSTRAINT fk_account_transactions_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- Name: accounts fk_accounts_id_account_types; Type: FK CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.accounts
    ADD CONSTRAINT fk_accounts_id_account_types FOREIGN KEY (id_account_types) REFERENCES public.account_types(id_account_types);


--
-- Name: payments_calendar fk_payments_calendar_id_account; Type: FK CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.payments_calendar
    ADD CONSTRAINT fk_payments_calendar_id_account FOREIGN KEY (id_account) REFERENCES public.accounts(id_accounts);


--
-- Name: payments_calendar fk_payments_calendar_id_users; Type: FK CONSTRAINT; Schema: public; Owner: usertest
--

ALTER TABLE ONLY public.payments_calendar
    ADD CONSTRAINT fk_payments_calendar_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- PostgreSQL database dump complete
--

