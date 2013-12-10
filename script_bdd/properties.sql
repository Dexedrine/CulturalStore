
--
-- Name: sylius_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_property_id_seq', 19, true);


--
-- Data for Name: sylius_property; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sylius_property (id, name, presentation, type, configuration, created_at, updated_at) FROM stdin;
1	price	Prix	number	a:0:{}	2013-11-17 12:58:34	2013-11-17 12:58:34
3	genre	Genre	text	a:0:{}	2013-11-24 09:50:37	2013-11-24 09:50:37
6	type	Type	text	a:0:{}	2013-11-24 09:52:08	2013-11-24 09:52:08
7	nbPistes	Nombre de pistes	number	a:0:{}	2013-11-24 09:52:32	2013-11-24 09:52:32
8	duree	Durée	number	a:0:{}	2013-11-24 09:52:45	2013-11-24 09:52:45
9	artiste	Artiste	text	a:0:{}	2013-11-24 09:53:08	2013-11-24 09:53:08
10	format	Format	text	a:0:{}	2013-11-24 09:53:27	2013-11-24 09:53:27
11	auteur	Auteur	text	a:0:{}	2013-11-24 09:53:42	2013-11-24 09:53:42
12	langue	Langue	text	a:0:{}	2013-11-24 09:53:52	2013-11-24 09:53:52
13	subLangue	Langue des sous-titres	text	a:0:{}	2013-11-24 09:54:08	2013-11-24 09:54:08
14	PEGI	PEGI	number	a:0:{}	2013-11-24 09:54:24	2013-11-24 09:54:24
15	plateforme	Plateforme	text	a:0:{}	2013-11-24 09:54:37	2013-11-24 09:54:37
16	quantite	Quantité	number	a:0:{}	2013-11-24 09:54:50	2013-11-24 09:54:50
17	dateEvent	Date de l'évènement	text	a:0:{}	2013-11-24 09:55:28	2013-11-24 09:55:28
18	lieu	Lieu	text	a:0:{}	2013-11-24 09:55:38	2013-11-24 09:55:38
19	image	Image	text	a:0:{}	2013-11-24 10:03:28	2013-11-24 10:03:28
\.
