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
-- Data for Name: administrateur; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: auser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auser_id_seq', 5, true);


--
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cart VALUES (1);
INSERT INTO cart VALUES (2);


--
-- Name: cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cart_id_seq', 2, true);


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO product VALUES (1, 'Hunger Games', 'hunger-games', 'le film hunger games adapté du livre', '2013-12-14 18:30:01', 'video', NULL, '2013-12-14 18:30:01', '2013-12-14 18:30:01', NULL);
INSERT INTO product VALUES (2, 'Twilight Chapitre 1', 'twilight-chapitre-1', 'Le premier tome de la série twilight', '2013-12-14 18:32:08', 'book', NULL, '2013-12-14 18:32:08', '2013-12-14 18:32:08', NULL);
INSERT INTO product VALUES (3, 'XCOM Enemy Unknown', 'xcom-enemy-unknown', 'jeu de stratégie au tour par tour avec des aliens!', '2013-12-14 18:33:39', 'game', NULL, '2013-12-14 18:33:39', '2013-12-14 18:33:39', NULL);
INSERT INTO product VALUES (4, 'Lara Fabian - A Wonderful Life', 'lara-fabian-a-wonderful-life', 'le dernier album de lara fabian', '2013-12-14 18:35:36', 'music', NULL, '2013-12-14 18:35:36', '2013-12-14 18:35:36', NULL);
INSERT INTO product VALUES (5, 'Don''t Starve', 'don-t-starve', 'jeu de survie', '2013-12-17 13:17:58', 'game', NULL, '2013-12-17 13:17:58', '2013-12-17 13:17:58', NULL);


--
-- Data for Name: cart_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cart_item VALUES (1, 4);


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
INSERT INTO utilisateur VALUES (4, 1, 'Meresse', 'Lucie', true, false);
INSERT INTO utilisateur VALUES (1, 2, 'Dhaleine', 'Lucille', true, false);


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO orders VALUES (1, 1, '2013-12-14 18:36:55', 4598);


--
-- Data for Name: order_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO order_item VALUES (1, 2);
INSERT INTO order_item VALUES (1, 3);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('orders_id_seq', 1, true);


--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('product_id_seq', 5, true);


--
-- Data for Name: sylius_property; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sylius_property VALUES (1, 'price', 'Prix', 'number', 'a:0:{}', '2013-11-17 12:58:34', '2013-11-17 12:58:34');
INSERT INTO sylius_property VALUES (3, 'genre', 'Genre', 'text', 'a:0:{}', '2013-11-24 09:50:37', '2013-11-24 09:50:37');
INSERT INTO sylius_property VALUES (6, 'type', 'Type', 'text', 'a:0:{}', '2013-11-24 09:52:08', '2013-11-24 09:52:08');
INSERT INTO sylius_property VALUES (7, 'nbPistes', 'Nombre de pistes', 'number', 'a:0:{}', '2013-11-24 09:52:32', '2013-11-24 09:52:32');
INSERT INTO sylius_property VALUES (8, 'duree', 'Durée', 'number', 'a:0:{}', '2013-11-24 09:52:45', '2013-11-24 09:52:45');
INSERT INTO sylius_property VALUES (9, 'artiste', 'Artiste', 'text', 'a:0:{}', '2013-11-24 09:53:08', '2013-11-24 09:53:08');
INSERT INTO sylius_property VALUES (10, 'format', 'Format', 'text', 'a:0:{}', '2013-11-24 09:53:27', '2013-11-24 09:53:27');
INSERT INTO sylius_property VALUES (11, 'auteur', 'Auteur', 'text', 'a:0:{}', '2013-11-24 09:53:42', '2013-11-24 09:53:42');
INSERT INTO sylius_property VALUES (12, 'langue', 'Langue', 'text', 'a:0:{}', '2013-11-24 09:53:52', '2013-11-24 09:53:52');
INSERT INTO sylius_property VALUES (13, 'subLangue', 'Langue des sous-titres', 'text', 'a:0:{}', '2013-11-24 09:54:08', '2013-11-24 09:54:08');
INSERT INTO sylius_property VALUES (14, 'PEGI', 'PEGI', 'number', 'a:0:{}', '2013-11-24 09:54:24', '2013-11-24 09:54:24');
INSERT INTO sylius_property VALUES (15, 'plateforme', 'Plateforme', 'text', 'a:0:{}', '2013-11-24 09:54:37', '2013-11-24 09:54:37');
INSERT INTO sylius_property VALUES (16, 'quantite', 'Quantité', 'number', 'a:0:{}', '2013-11-24 09:54:50', '2013-11-24 09:54:50');
INSERT INTO sylius_property VALUES (17, 'dateEvent', 'Date de l''évènement', 'text', 'a:0:{}', '2013-11-24 09:55:28', '2013-11-24 09:55:28');
INSERT INTO sylius_property VALUES (18, 'lieu', 'Lieu', 'text', 'a:0:{}', '2013-11-24 09:55:38', '2013-11-24 09:55:38');
INSERT INTO sylius_property VALUES (19, 'image', 'Image', 'text', 'a:0:{}', '2013-11-24 10:03:28', '2013-11-24 10:03:28');


--
-- Data for Name: sylius_product_property; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sylius_product_property VALUES (1, 1, 1, '999');
INSERT INTO sylius_product_property VALUES (2, 1, 19, 'http://media.melty.fr/pmedia-1927780-ajust_610-f1385650268/hunger-games-succes-au-cinema.jpg');
INSERT INTO sylius_product_property VALUES (3, 1, 8, '120');
INSERT INTO sylius_product_property VALUES (4, 1, 3, 'aventure');
INSERT INTO sylius_product_property VALUES (5, 1, 6, 'film');
INSERT INTO sylius_product_property VALUES (6, 1, 12, 'anglais');
INSERT INTO sylius_product_property VALUES (7, 1, 10, 'avi');
INSERT INTO sylius_product_property VALUES (8, 1, 13, 'français');
INSERT INTO sylius_product_property VALUES (9, 2, 1, '1599');
INSERT INTO sylius_product_property VALUES (10, 2, 19, 'http://www.lecture-academy.com/wp-content/uploads/2013/12/logo_11716.jpg');
INSERT INTO sylius_product_property VALUES (11, 2, 12, 'français');
INSERT INTO sylius_product_property VALUES (12, 2, 3, 'roman');
INSERT INTO sylius_product_property VALUES (13, 2, 6, 'livre');
INSERT INTO sylius_product_property VALUES (14, 2, 11, 'Stephanie Meyer');
INSERT INTO sylius_product_property VALUES (15, 2, 10, 'epub');
INSERT INTO sylius_product_property VALUES (16, 3, 1, '2999');
INSERT INTO sylius_product_property VALUES (17, 3, 19, 'http://i.jeuxactus.com/datas/jeux/x/c/xcom-enemy-unknown/xl/xcom-enemy-unknown-jaqu-502cd3c6355f0.jpg');
INSERT INTO sylius_product_property VALUES (18, 3, 3, 'stratégie');
INSERT INTO sylius_product_property VALUES (19, 3, 15, 'windows');
INSERT INTO sylius_product_property VALUES (20, 3, 14, '18+');
INSERT INTO sylius_product_property VALUES (21, 4, 1, '1299');
INSERT INTO sylius_product_property VALUES (22, 4, 19, 'http://static.fnac-static.com/multimedia/images_produits/ZoomPE/9/2/7/5099751516729.jpg');
INSERT INTO sylius_product_property VALUES (23, 4, 8, '60');
INSERT INTO sylius_product_property VALUES (24, 4, 3, 'chanson');
INSERT INTO sylius_product_property VALUES (25, 4, 7, '12');
INSERT INTO sylius_product_property VALUES (26, 4, 9, 'Lara Fabian');
INSERT INTO sylius_product_property VALUES (27, 4, 10, 'mp3');
INSERT INTO sylius_product_property VALUES (28, 5, 1, '500');
INSERT INTO sylius_product_property VALUES (29, 5, 19, 'http://www.bad-neighbor.fr/wp-content/uploads/2013/05/showposter.png');
INSERT INTO sylius_product_property VALUES (30, 5, 3, 'aventure');
INSERT INTO sylius_product_property VALUES (31, 5, 15, 'linux');
INSERT INTO sylius_product_property VALUES (32, 5, 14, '12+');


--
-- Name: sylius_product_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_product_property_id_seq', 32, true);


--
-- Name: sylius_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_property_id_seq', 19, true);


--
-- Data for Name: sylius_prototype; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: sylius_prototype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sylius_prototype_id_seq', 1, false);


--
-- Data for Name: sylius_prototype_property; Type: TABLE DATA; Schema: public; Owner: postgres
--



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
-- Data for Name: user_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO user_order VALUES (1, 1);


--
-- PostgreSQL database dump complete
--
