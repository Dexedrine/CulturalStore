--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: auser; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO auser VALUES (3, 'florian@gmail.com', 'florian@gmail.com', 'florian@gmail.com', 'florian@gmail.com', true, '8wh95t0a5c84gw8cwcoksso88c4gccc', '45Wjl+OdUo/vVogXRZx/bekiA7ax0HfIBJ8QWH+tjrPn8DOXnBBdqJQfD8odGwMCGKjruS1tcut8V/OKasjk/Q==', '2013-12-14 18:41:08', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (4, 'lucie@gmail.com', 'lucie@gmail.com', 'lucie@gmail.com', 'lucie@gmail.com', true, 'jk7u0jqj9n48gwg88wcs4okc8ckoc0k', 'U4dsZJi6GIxnAb2WmknM7yEkm/0Hahk2UVR3Wv9soSxvTx4cwNaHPcvxdLkuPywz4zZg50ZvpcCyinjkwCt4QA==', '2013-12-14 18:36:04', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (2, 'anthony@gmail.com', 'anthony@gmail.com', 'anthony@gmail.com', 'anthony@gmail.com', true, 'tqnzp44d0i8cog0sw08kw0swk088k8w', 'zbTXFWY0N59GljG3WFIcXMxbwQQc5fZbhnnrvYWsq2FmznLAL9E3Hjf7ShabfYkmGGFSZTxAHiu4mKaEitWI/Q==', '2013-12-14 18:37:53', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (5, 'fournisseur@gmail.com', 'fournisseur@gmail.com', 'fournisseur@gmail.com', 'fournisseur@gmail.com', true, 'fn5sb5lpc9c8go44gskoss4cw4cw8g8', 'LqaCgr7tathnRTyEkbfW3pqmeKxSX94v5O0/5OVncMF5/FPppCO6H8UNneUWclNI68p76by2TZM6/zbf7umRMA==', '2013-12-17 13:16:33', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_FOURNISSEUR";}', false, NULL, 'fournisseur');
INSERT INTO auser VALUES (1, 'lucille@gmail.com', 'lucille@gmail.com', 'lucille@gmail.com', 'lucille@gmail.com', true, '8k4z5d8j568s44cogoc4k4g088ckwcs', 'MBrD2t7unSxKdkMSzEwynXiCGqQdZAkkS4w8p1HuXwmMNsFI0YZGIOoePjOiuPmutM3/9nXuioNlT64LbQdcJA==', '2013-12-17 13:22:09', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');



--
-- Name: auser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auser_id_seq', 5, true);



--
-- Data for Name: community; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO community VALUES (1, 'lara fabian', 'lara-fabian', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (2, 'chanson française', 'chanson-française', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (3, 'rap', 'rap', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (4, 'J-pop', 'j-pop', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO community VALUES (5, 'animation', 'animation', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (6, 'films d''horreur', 'films-d''horreur', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (7, 'comédie romantique', 'comédie-romantique', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (8, 'martin scorsese', 'martin-scorsese', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO community VALUES (9, 'stratégie', 'stratégie', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO community VALUES (10, 'call of duty', 'call-of-duty', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO community VALUES (11, 'dota 2', 'dota-2', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO community VALUES (12, 'jeux indépendants', 'jeux-indépendants', '2013-12-14 18:40:27', '2013-12-14 18:40:27');


--
-- Name: community_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('community_id_seq', 12, true);


--
-- Data for Name: communitysubscribing; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO communitysubscribing VALUES (1, 1, 'theme', '1', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (2, 2, 'theme', '1', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (3, 3, 'theme', '1', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (4, 4, 'theme', '1', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (5, 5, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (6, 6, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (7, 7, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (8, 8, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (9, 9, 'theme', '3', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (10, 10, 'theme', '3', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (11, 11, 'theme', '3', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (12, 12, 'theme', '3', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (13, 1, 'user', '2', '2013-12-14 18:40:43', '2013-12-14 18:40:43');
INSERT INTO communitysubscribing VALUES (14, 4, 'user', '2', '2013-12-14 18:40:45', '2013-12-14 18:40:45');
INSERT INTO communitysubscribing VALUES (15, 12, 'user', '2', '2013-12-14 18:40:47', '2013-12-14 18:40:47');
INSERT INTO communitysubscribing VALUES (16, 1, 'user', '3', '2013-12-14 18:41:21', '2013-12-14 18:41:21');
INSERT INTO communitysubscribing VALUES (17, 8, 'user', '3', '2013-12-14 18:41:24', '2013-12-14 18:41:24');
INSERT INTO communitysubscribing VALUES (18, 9, 'user', '3', '2013-12-14 18:41:27', '2013-12-14 18:41:27');
INSERT INTO communitysubscribing VALUES (19, 12, 'product', '5', '2013-12-17 13:18:14', '2013-12-17 13:18:14');


--
-- Name: communitysubscribing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('communitysubscribing_id_seq', 19, true);


--
-- Data for Name: fournisseur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO fournisseur VALUES (5, 'Fnac', '12 rue de la fnac', '59000', 'Lille', '12451245');


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO utilisateur VALUES (2, NULL, 'Maia', 'Anthony', true, false);
INSERT INTO utilisateur VALUES (3, NULL, 'Licour', 'Florian', true, false);
INSERT INTO utilisateur VALUES (4, NULL, 'Meresse', 'Lucie', true, false);
INSERT INTO utilisateur VALUES (1, NULL, 'Dhaleine', 'Lucille', true, false);





--
-- Data for Name: theme; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO theme VALUES (1, 'Musique');
INSERT INTO theme VALUES (2, 'Cinema');
INSERT INTO theme VALUES (3, 'Jeux videos');
INSERT INTO theme VALUES (4, 'Livres');
INSERT INTO theme VALUES (5, 'Spectacles');
INSERT INTO theme VALUES (6, 'Applications');


--
-- Name: theme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('theme_id_seq', 6, true);



--
-- PostgreSQL database dump complete
--
