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
INSERT INTO auser VALUES (2, 'anthony@gmail.com', 'anthony@gmail.com', 'anthony@gmail.com', 'anthony@gmail.com', true, 'tqnzp44d0i8cog0sw08kw0swk088k8w', 'zbTXFWY0N59GljG3WFIcXMxbwQQc5fZbhnnrvYWsq2FmznLAL9E3Hjf7ShabfYkmGGFSZTxAHiu4mKaEitWI/Q==', '2013-12-14 18:37:53', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (1, 'lucille@gmail.com', 'lucille@gmail.com', 'lucille@gmail.com', 'lucille@gmail.com', true, '8k4z5d8j568s44cogoc4k4g088ckwcs', 'MBrD2t7unSxKdkMSzEwynXiCGqQdZAkkS4w8p1HuXwmMNsFI0YZGIOoePjOiuPmutM3/9nXuioNlT64LbQdcJA==', '2013-12-17 13:22:09', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');
INSERT INTO auser VALUES (6, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', true, '380as61k68w0skc8g84w08owows04gc', 'r/NiWgVqdWkgNdgbwJKRZMrLW2yfg/tfvPc4e/29LG+lDh+9iJappSaOyzRVaXA/FyXoq+cwaY3eQzN6QYilJg==', '2014-03-22 09:16:39', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', false, NULL, 'admin');
INSERT INTO auser VALUES (5, 'fournisseur@gmail.com', 'fournisseur@gmail.com', 'fournisseur@gmail.com', 'fournisseur@gmail.com', true, 'fn5sb5lpc9c8go44gskoss4cw4cw8g8', 'LqaCgr7tathnRTyEkbfW3pqmeKxSX94v5O0/5OVncMF5/FPppCO6H8UNneUWclNI68p76by2TZM6/zbf7umRMA==', '2014-03-22 09:17:45', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_FOURNISSEUR";}', false, NULL, 'fournisseur');
INSERT INTO auser VALUES (4, 'lucie@gmail.com', 'lucie@gmail.com', 'lucie@gmail.com', 'lucie@gmail.com', true, 'jk7u0jqj9n48gwg88wcs4okc8ckoc0k', 'U4dsZJi6GIxnAb2WmknM7yEkm/0Hahk2UVR3Wv9soSxvTx4cwNaHPcvxdLkuPywz4zZg50ZvpcCyinjkwCt4QA==', '2014-03-22 09:21:31', false, false, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_CLIENT";}', false, NULL, 'utilisateur');


--
-- Data for Name: administrateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO administrateur VALUES (6);


--
-- Name: auser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auser_id_seq', 6, true);


--
-- Data for Name: fournisseur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO fournisseur VALUES (5, 'Fnac', '12 rue de la fnac', '59000', 'Lille', '12451245');


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
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO product VALUES (3, 4, 5, 'La belle et la bête', 'Comte de Beaumont', 12, 'roman', 'http://www.images-booknode.com/book_cover/278/full/la-belle-et-la-bete,-suivi-de-l-oiseau-bleu-278483.jpg', '2014-03-22 06:50:10', 'imgAccueil.png', 'image/png', 0.75, 'book');
INSERT INTO product VALUES (4, 4, 5, 'L''Appel de Cthulhu', 'Partout dans le monde renaissent des rituels hideux, typiques d''un culte blasphématoire que l''on croyait disparu à jamais : le culte de Cthulhu. Les peuplades primitives se révoltent pour adorer d''odieuses idoles à l''effigie de la monstrueuse bête', 5, 'roman', 'http://s.scifi-universe.com/actualites/images-old/2010/LDB_ADC.jpg', '2014-03-22 08:00:37', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (5, 4, 5, 'Twilight, la collection', 'Ensemble des livres de la série Twilight', 14, 'roman', 'http://s1.e-monsite.com/2009/06/12/05/88290827livre-twilight-coffret-jpg.jpg', '2014-03-22 08:02:07', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (6, 4, 5, 'Les malheurs de Sophie', 'L''action se déroule dans un château de la campagne française du Second Empire où Sophie habite avec ses parents M. et Mme de Réan. Curieuse et aventureuse, elle commet bêtise sur bêtise avec la complicité critique de Paul, son cousin, qui est bon et sa tante lui montre le chemin. Elle a pour amies Camille et Madeleine de Fleurville, des petites filles modèles qu''elle peine à imiter.', 3, 'roman', 'http://pmcdn.priceminister.com/photo/Comtesse-De-Segur-Les-Malheurs-De-Sophie-Images-De-Francoise-Batet-Livre-749008692_ML.jpg', '2014-03-22 08:03:41', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (7, 4, 5, 'Kivy: Interactive Applications in Python', 'Use Kivy to implement apps and games in Python that run on multiple platforms', 14, 'roman', 'http://www.packtpub.com/sites/default/files/1596OS%20Getting%20Started%20with%20Kivy_Mini.jpg', '2014-03-22 08:05:57', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (8, 4, 5, 'Harry Potter et la coupe de feu', 'Harry Potter est une suite romanesque de fantasy comprenant sept tomes, écrite par J. K. Rowling entre 1997 et 2007.', 10, 'roman', 'http://www.babelio.com/couv/10230_671168.jpeg', '2014-03-22 08:07:43', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (9, 4, 5, 'Réinventez vos tartes', 'Livre de recettes de tartes et quiches', 6, 'roman', 'http://www.bazaravenue.com/images/rep_articles//grandes/df72b87f-e178-c8dc-a3d3-910298b0a3ff.jpg', '2014-03-22 08:08:47', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (11, 4, 5, 'Un roman', 'Un roman d''Hermann Paul', 3, 'roman', 'http://www.assietteaubeurre.org/ROMAN/romanbis_jpg/roman_p1_q30.jpg', '2014-03-22 08:10:02', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (12, 4, 5, 'Battle Royale', 'Livre de Takami', 13, 'roman', 'http://www.manga-news.com/public/images/vols/BattleRoyale_roman_poche.jpg', '2014-03-22 08:11:32', 'appel.jpg', 'image/jpeg', 0.75, 'book');
INSERT INTO product VALUES (13, 3, 5, 'Dota 2', 'jeu d''arene', 0, 'stratégie', 'http://latavernedutroll.files.wordpress.com/2013/02/dota2.jpg', '2014-03-22 08:34:35', 'appel.jpg', 'image/jpeg', 0.75, 'game');
INSERT INTO product VALUES (14, 3, 5, 'Mario', 'Jeu Nintendo de la série Mario', 32, 'stratégie', 'http://img2.wikia.nocookie.net/__cb20120922002941/fantendo/images/f/fc/MarioNSMBWii.png', '2014-03-22 08:35:29', 'appel.jpg', 'image/jpeg', 0.75, 'game');
INSERT INTO product VALUES (15, 3, 5, 'The legend of Zelda', 'Jeu de la série Zelda', 43, 'stratégie', 'http://static.mnium.org/images/contenu/actus/millenium/news_ocarina_of_time1.jpg', '2014-03-22 08:36:36', 'appel.jpg', 'image/jpeg', 0.75, 'game');
INSERT INTO product VALUES (16, 3, 5, 'Minecraft', 'Minecraft', 0, 'stratégie', 'http://screenshots.fr.sftcdn.net/fr/scrn/3342000/3342167/modloader-pour-minecraft-02-700x406.jpg', '2014-03-22 08:38:10', 'appel.jpg', 'image/jpeg', 0.75, 'game');
INSERT INTO product VALUES (17, 3, 5, 'Faster Than Light', 'Jeu vidéo', 0, 'stratégie', 'http://img3.wikia.nocookie.net/__cb20120618050911/ftl/images/3/33/FTL_Title.png', '2014-03-22 08:38:56', 'appel.jpg', 'image/jpeg', 0.75, 'game');
INSERT INTO product VALUES (18, 3, 5, 'Angry birds', 'Application mobile par Rovio', 0, 'stratégie', 'https://lh3.ggpht.com/nt7lisvneE-S-W1SP8hjfLD-JVrX_cuWLJaT2eKKn4LmvpzscqwXS1vnl_GSN95JCm2P=h900', '2014-03-22 08:39:49', 'appel.jpg', 'image/jpeg', 0.75, 'game');
INSERT INTO product VALUES (19, 1, 5, 'Lara Fabian', 'Son nouvel album est sorti !', 12, 'chanson', 'http://www.peopleinside.fr/wp-content/uploads/2011/03/cd-cover.jpg?8d9797', '2014-03-22 08:53:48', 'appel.jpg', 'image/jpeg', 0.75, 'music');
INSERT INTO product VALUES (20, 1, 5, 'Le chemin', 'Le premier album du groupe Kyo', 2, 'rock', 'http://www.lamusiqueblog.com/wp-content/uploads/2014/01/kyo-20051228-94036.jpg', '2014-03-22 08:54:37', 'appel.jpg', 'image/jpeg', 0.75, 'music');
INSERT INTO product VALUES (22, 1, 5, 'Take a look in the mirror', 'Korn', 13, 'rock', 'http://www.hitimport.com/document/produits/korntakealook.jpg', '2014-03-22 08:55:39', 'appel.jpg', 'image/jpeg', 0.75, 'music');
INSERT INTO product VALUES (23, 1, 5, 'Portrait of an american family', 'Portrait of an american family', 12, 'rock', 'http://nsa32.casimages.com/img/2012/11/07/12110707344688084.jpg', '2014-03-22 08:56:49', 'appel.jpg', 'image/jpeg', 0.75, 'music');
INSERT INTO product VALUES (24, 1, 5, 'Lunch box', 'Lunch box', 12, 'rock', 'http://eil.com/images/main/Marilyn+Manson+-+Lunch+Box+-+3+DISC+CD%2FDVD+SET-432653.jpg', '2014-03-22 08:57:42', 'appel.jpg', 'image/jpeg', 0.75, 'music');
INSERT INTO product VALUES (25, 1, 5, 'Eat me, drink me', 'Eat me, drink me', 12, 'chanson', 'http://eil.com/images/main/Marilyn+Manson+-+Eat+Me,+Drink+Me+-+CD+ALBUM-401743.jpg', '2014-03-22 08:58:23', 'appel.jpg', 'image/jpeg', 0.75, 'music');


--
-- Data for Name: book; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO book VALUES (3, 'Français', 'livre', 'epub', 'Beaumont');
INSERT INTO book VALUES (4, 'Français', 'livre', 'epub', 'H.P Lovecraft');
INSERT INTO book VALUES (5, 'Français', 'livre', 'epub', 'Stephanie Meyer');
INSERT INTO book VALUES (6, 'Français', 'livre', 'epub', 'Comtesse de Ségur');
INSERT INTO book VALUES (7, 'English', 'livre', 'pdf', 'Roberto Ulloa');
INSERT INTO book VALUES (8, 'Français', 'livre', 'epub', 'J. K. Rowling');
INSERT INTO book VALUES (9, 'Français', 'livre', 'epub', 'Katherine Kluger');
INSERT INTO book VALUES (11, 'English', 'livre', 'epub', 'Hermann Paul');
INSERT INTO book VALUES (12, 'English', 'livre', 'epub', 'Takami');


--
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cart VALUES (1);


--
-- Name: cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cart_id_seq', 1, true);


--
-- Data for Name: cart_item; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO utilisateur VALUES (2, NULL, 'Maia', 'Anthony', true, false);
INSERT INTO utilisateur VALUES (3, NULL, 'Licour', 'Florian', true, false);
INSERT INTO utilisateur VALUES (1, NULL, 'Dhaleine', 'Lucille', true, false);
INSERT INTO utilisateur VALUES (4, 1, 'Meresse', 'Lucie', true, false);


--
-- Data for Name: comment; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO comment VALUES (1, 23, 4, 'Superbe album de Marilyn Manson !! J''adore :)', 5, '2014-03-22 09:23:40');
INSERT INTO comment VALUES (2, 22, 4, 'Trop bien, l''un de leur meilleur album', 4, '2014-03-22 09:24:02');


--
-- Name: comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('comment_id_seq', 2, true);


--
-- Data for Name: community; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO community VALUES (1, 'lara fabian', 'lara-fabian', '2013-12-14 18:39:14', '2013-12-14 18:39:14', 0.75);
INSERT INTO community VALUES (2, 'chanson française', 'chanson-française', '2013-12-14 18:39:14', '2013-12-14 18:39:14', 0.75);
INSERT INTO community VALUES (3, 'rap', 'rap', '2013-12-14 18:39:14', '2013-12-14 18:39:14', 0.75);
INSERT INTO community VALUES (4, 'J-pop', 'j-pop', '2013-12-14 18:39:14', '2013-12-14 18:39:14', 0.75);
INSERT INTO community VALUES (5, 'animation', 'animation', '2013-12-14 18:39:52', '2013-12-14 18:39:52', 0.75);
INSERT INTO community VALUES (6, 'films d''horreur', 'films-d''horreur', '2013-12-14 18:39:52', '2013-12-14 18:39:52', 0.75);
INSERT INTO community VALUES (7, 'comédie romantique', 'comédie-romantique', '2013-12-14 18:39:52', '2013-12-14 18:39:52', 0.75);
INSERT INTO community VALUES (8, 'martin scorsese', 'martin-scorsese', '2013-12-14 18:39:52', '2013-12-14 18:39:52', 0.75);
INSERT INTO community VALUES (9, 'stratégie', 'stratégie', '2013-12-14 18:40:27', '2013-12-14 18:40:27', 0.75);
INSERT INTO community VALUES (10, 'call of duty', 'call-of-duty', '2013-12-14 18:40:27', '2013-12-14 18:40:27', 0.75);
INSERT INTO community VALUES (11, 'dota 2', 'dota-2', '2013-12-14 18:40:27', '2013-12-14 18:40:27', 0.75);
INSERT INTO community VALUES (12, 'jeux indépendants', 'jeux-indépendants', '2013-12-14 18:40:27', '2013-12-14 18:40:27', 0.75);
INSERT INTO community VALUES (13, 'Metal', 'metal', '2014-03-22 09:11:01', '2014-03-22 09:11:01', 0.75);
INSERT INTO community VALUES (14, 'SF', 'sf', '2014-03-22 09:11:37', '2014-03-22 09:11:37', 0.75);
INSERT INTO community VALUES (15, 'Enfant', 'enfant', '2014-03-22 09:11:37', '2014-03-22 09:11:37', 0.75);
INSERT INTO community VALUES (16, 'Adulte', 'adulte', '2014-03-22 09:11:37', '2014-03-22 09:11:37', 0.75);
INSERT INTO community VALUES (17, 'Vampire', 'vampire', '2014-03-22 09:11:37', '2014-03-22 09:11:37', 0.75);
INSERT INTO community VALUES (18, 'Nord', 'nord', '2014-03-22 09:11:49', '2014-03-22 09:11:49', 0.75);
INSERT INTO community VALUES (19, 'Festival', 'festival', '2014-03-22 09:11:49', '2014-03-22 09:11:49', 0.75);
INSERT INTO community VALUES (20, 'Lille', 'lille', '2014-03-22 09:11:49', '2014-03-22 09:11:49', 0.75);
INSERT INTO community VALUES (21, 'Android', 'android', '2014-03-22 09:12:02', '2014-03-22 09:12:02', 0.75);
INSERT INTO community VALUES (22, 'Payant', 'payant', '2014-03-22 09:12:02', '2014-03-22 09:12:02', 0.75);
INSERT INTO community VALUES (23, 'Gratuit', 'gratuit', '2014-03-22 09:12:02', '2014-03-22 09:12:02', 0.75);
INSERT INTO community VALUES (24, 'Simulation', 'simulation', '2014-03-22 09:12:02', '2014-03-22 09:12:02', 0.75);
INSERT INTO community VALUES (25, 'Marilyn Manson', 'marilyn-manson', '2014-03-22 09:17:01', '2014-03-22 09:17:01', 0.75);
INSERT INTO community VALUES (26, 'Apprentissage', 'apprentissage', '2014-03-22 09:17:34', '2014-03-22 09:17:34', 0.75);
INSERT INTO community VALUES (27, 'Action', 'action', '2014-03-22 09:17:34', '2014-03-22 09:17:34', 0.75);
INSERT INTO community VALUES (28, 'Guerre', 'guerre', '2014-03-22 09:17:34', '2014-03-22 09:17:34', 0.75);
INSERT INTO community VALUES (29, 'Plateforme', 'plateforme', '2014-03-22 09:18:42', '2014-03-22 09:18:42', 0.75);


--
-- Name: community_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('community_id_seq', 29, true);


--
-- Data for Name: community_product; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO community_product VALUES (25, 13);
INSERT INTO community_product VALUES (23, 13);
INSERT INTO community_product VALUES (22, 13);
INSERT INTO community_product VALUES (20, 2);
INSERT INTO community_product VALUES (18, 9);
INSERT INTO community_product VALUES (18, 24);
INSERT INTO community_product VALUES (17, 23);
INSERT INTO community_product VALUES (17, 24);
INSERT INTO community_product VALUES (17, 27);
INSERT INTO community_product VALUES (17, 9);
INSERT INTO community_product VALUES (15, 29);
INSERT INTO community_product VALUES (15, 9);
INSERT INTO community_product VALUES (14, 29);
INSERT INTO community_product VALUES (13, 11);
INSERT INTO community_product VALUES (13, 23);
INSERT INTO community_product VALUES (13, 9);
INSERT INTO community_product VALUES (12, 14);
INSERT INTO community_product VALUES (12, 16);
INSERT INTO community_product VALUES (8, 15);
INSERT INTO community_product VALUES (8, 16);
INSERT INTO community_product VALUES (4, 14);
INSERT INTO community_product VALUES (4, 16);
INSERT INTO community_product VALUES (5, 17);
INSERT INTO community_product VALUES (16, 23);
INSERT INTO community_product VALUES (16, 24);


--
-- Data for Name: community_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO community_user VALUES (4, 13);
INSERT INTO community_user VALUES (4, 17);
INSERT INTO community_user VALUES (4, 11);
INSERT INTO community_user VALUES (4, 16);
INSERT INTO community_user VALUES (4, 23);


--
-- Data for Name: communitysubscribing; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO communitysubscribing VALUES (1, 1, 'theme', '1', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (2, 2, 'theme', '1', '2013-12-14 18:39:14', '2013-12-14 18:39:14');
INSERT INTO communitysubscribing VALUES (5, 5, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (6, 6, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (7, 7, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (8, 8, 'theme', '2', '2013-12-14 18:39:52', '2013-12-14 18:39:52');
INSERT INTO communitysubscribing VALUES (9, 9, 'theme', '3', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (11, 11, 'theme', '3', '2013-12-14 18:40:27', '2013-12-14 18:40:27');
INSERT INTO communitysubscribing VALUES (13, 1, 'user', '2', '2013-12-14 18:40:43', '2013-12-14 18:40:43');
INSERT INTO communitysubscribing VALUES (14, 4, 'user', '2', '2013-12-14 18:40:45', '2013-12-14 18:40:45');
INSERT INTO communitysubscribing VALUES (15, 12, 'user', '2', '2013-12-14 18:40:47', '2013-12-14 18:40:47');
INSERT INTO communitysubscribing VALUES (16, 1, 'user', '3', '2013-12-14 18:41:21', '2013-12-14 18:41:21');
INSERT INTO communitysubscribing VALUES (17, 8, 'user', '3', '2013-12-14 18:41:24', '2013-12-14 18:41:24');
INSERT INTO communitysubscribing VALUES (18, 9, 'user', '3', '2013-12-14 18:41:27', '2013-12-14 18:41:27');
INSERT INTO communitysubscribing VALUES (19, 12, 'product', '5', '2013-12-17 13:18:14', '2013-12-17 13:18:14');
INSERT INTO communitysubscribing VALUES (20, 13, 'theme', '1', '2014-03-22 09:11:01', '2014-03-22 09:11:01');
INSERT INTO communitysubscribing VALUES (21, 14, 'theme', '4', '2014-03-22 09:11:37', '2014-03-22 09:11:37');
INSERT INTO communitysubscribing VALUES (22, 15, 'theme', '4', '2014-03-22 09:11:37', '2014-03-22 09:11:37');
INSERT INTO communitysubscribing VALUES (23, 16, 'theme', '4', '2014-03-22 09:11:37', '2014-03-22 09:11:37');
INSERT INTO communitysubscribing VALUES (24, 17, 'theme', '4', '2014-03-22 09:11:37', '2014-03-22 09:11:37');
INSERT INTO communitysubscribing VALUES (25, 18, 'theme', '5', '2014-03-22 09:11:49', '2014-03-22 09:11:49');
INSERT INTO communitysubscribing VALUES (26, 19, 'theme', '5', '2014-03-22 09:11:49', '2014-03-22 09:11:49');
INSERT INTO communitysubscribing VALUES (27, 20, 'theme', '5', '2014-03-22 09:11:49', '2014-03-22 09:11:49');
INSERT INTO communitysubscribing VALUES (28, 21, 'theme', '6', '2014-03-22 09:12:02', '2014-03-22 09:12:02');
INSERT INTO communitysubscribing VALUES (29, 22, 'theme', '6', '2014-03-22 09:12:02', '2014-03-22 09:12:02');
INSERT INTO communitysubscribing VALUES (30, 23, 'theme', '6', '2014-03-22 09:12:02', '2014-03-22 09:12:02');
INSERT INTO communitysubscribing VALUES (31, 24, 'theme', '6', '2014-03-22 09:12:02', '2014-03-22 09:12:02');
INSERT INTO communitysubscribing VALUES (32, 13, 'product', '25', '2014-03-22 09:15:13', '2014-03-22 09:15:13');
INSERT INTO communitysubscribing VALUES (33, 13, 'product', '23', '2014-03-22 09:15:30', '2014-03-22 09:15:30');
INSERT INTO communitysubscribing VALUES (34, 13, 'product', '22', '2014-03-22 09:15:41', '2014-03-22 09:15:41');
INSERT INTO communitysubscribing VALUES (35, 25, 'theme', '1', '2014-03-22 09:17:01', '2014-03-22 09:17:01');
INSERT INTO communitysubscribing VALUES (36, 24, 'theme', '3', '2014-03-22 09:17:34', '2014-03-22 09:17:34');
INSERT INTO communitysubscribing VALUES (37, 26, 'theme', '3', '2014-03-22 09:17:34', '2014-03-22 09:17:34');
INSERT INTO communitysubscribing VALUES (38, 27, 'theme', '3', '2014-03-22 09:17:34', '2014-03-22 09:17:34');
INSERT INTO communitysubscribing VALUES (39, 28, 'theme', '3', '2014-03-22 09:17:34', '2014-03-22 09:17:34');
INSERT INTO communitysubscribing VALUES (40, 2, 'product', '20', '2014-03-22 09:17:56', '2014-03-22 09:17:56');
INSERT INTO communitysubscribing VALUES (41, 9, 'product', '18', '2014-03-22 09:18:08', '2014-03-22 09:18:08');
INSERT INTO communitysubscribing VALUES (42, 24, 'product', '18', '2014-03-22 09:18:14', '2014-03-22 09:18:14');
INSERT INTO communitysubscribing VALUES (43, 22, 'theme', '3', '2014-03-22 09:18:42', '2014-03-22 09:18:42');
INSERT INTO communitysubscribing VALUES (44, 23, 'theme', '3', '2014-03-22 09:18:42', '2014-03-22 09:18:42');
INSERT INTO communitysubscribing VALUES (45, 29, 'theme', '3', '2014-03-22 09:18:42', '2014-03-22 09:18:42');
INSERT INTO communitysubscribing VALUES (46, 23, 'product', '17', '2014-03-22 09:18:56', '2014-03-22 09:18:56');
INSERT INTO communitysubscribing VALUES (47, 24, 'product', '17', '2014-03-22 09:18:58', '2014-03-22 09:18:58');
INSERT INTO communitysubscribing VALUES (48, 27, 'product', '17', '2014-03-22 09:19:02', '2014-03-22 09:19:02');
INSERT INTO communitysubscribing VALUES (49, 9, 'product', '17', '2014-03-22 09:19:04', '2014-03-22 09:19:04');
INSERT INTO communitysubscribing VALUES (50, 29, 'product', '15', '2014-03-22 09:19:13', '2014-03-22 09:19:13');
INSERT INTO communitysubscribing VALUES (51, 9, 'product', '15', '2014-03-22 09:19:15', '2014-03-22 09:19:15');
INSERT INTO communitysubscribing VALUES (52, 29, 'product', '14', '2014-03-22 09:19:26', '2014-03-22 09:19:26');
INSERT INTO communitysubscribing VALUES (53, 11, 'product', '13', '2014-03-22 09:19:37', '2014-03-22 09:19:37');
INSERT INTO communitysubscribing VALUES (54, 23, 'product', '13', '2014-03-22 09:19:40', '2014-03-22 09:19:40');
INSERT INTO communitysubscribing VALUES (55, 9, 'product', '13', '2014-03-22 09:19:42', '2014-03-22 09:19:42');
INSERT INTO communitysubscribing VALUES (56, 14, 'product', '12', '2014-03-22 09:19:53', '2014-03-22 09:19:53');
INSERT INTO communitysubscribing VALUES (57, 16, 'product', '12', '2014-03-22 09:19:55', '2014-03-22 09:19:55');
INSERT INTO communitysubscribing VALUES (58, 15, 'product', '8', '2014-03-22 09:20:07', '2014-03-22 09:20:07');
INSERT INTO communitysubscribing VALUES (59, 16, 'product', '8', '2014-03-22 09:20:10', '2014-03-22 09:20:10');
INSERT INTO communitysubscribing VALUES (60, 14, 'product', '4', '2014-03-22 09:20:19', '2014-03-22 09:20:19');
INSERT INTO communitysubscribing VALUES (61, 16, 'product', '4', '2014-03-22 09:20:21', '2014-03-22 09:20:21');
INSERT INTO communitysubscribing VALUES (62, 17, 'product', '5', '2014-03-22 09:20:49', '2014-03-22 09:20:49');
INSERT INTO communitysubscribing VALUES (63, 23, 'product', '16', '2014-03-22 09:21:04', '2014-03-22 09:21:04');
INSERT INTO communitysubscribing VALUES (64, 24, 'product', '16', '2014-03-22 09:21:07', '2014-03-22 09:21:07');
INSERT INTO communitysubscribing VALUES (65, 13, 'user', '4', '2014-03-22 09:25:10', '2014-03-22 09:25:10');
INSERT INTO communitysubscribing VALUES (66, 17, 'user', '4', '2014-03-22 09:25:14', '2014-03-22 09:25:14');
INSERT INTO communitysubscribing VALUES (67, 11, 'user', '4', '2014-03-22 09:25:18', '2014-03-22 09:25:18');
INSERT INTO communitysubscribing VALUES (68, 16, 'user', '4', '2014-03-22 09:25:26', '2014-03-22 09:25:26');
INSERT INTO communitysubscribing VALUES (69, 23, 'user', '4', '2014-03-22 09:25:28', '2014-03-22 09:25:28');


--
-- Name: communitysubscribing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('communitysubscribing_id_seq', 69, true);


--
-- Data for Name: game; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO game VALUES (13, 'windows', '12+');
INSERT INTO game VALUES (14, 'windows', '3+');
INSERT INTO game VALUES (15, 'windows', '3+');
INSERT INTO game VALUES (16, 'windows', '3+');
INSERT INTO game VALUES (17, 'linux', '3+');
INSERT INTO game VALUES (18, 'android', '3+');


--
-- Data for Name: music; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO music VALUES (19, 120, 12, 'mp3', 'Lara Fabian');
INSERT INTO music VALUES (20, 120, 12, 'mp3', 'Kyo');
INSERT INTO music VALUES (22, 120, 12, 'mp3', 'Korn');
INSERT INTO music VALUES (23, 120, 12, 'mp3', 'Marilyn Manson');
INSERT INTO music VALUES (24, 120, 12, 'mp3', 'Marilyn Manson');
INSERT INTO music VALUES (25, 120, 12, 'mp3', 'Marilyn Manson');


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO orders VALUES (1, 4, '2014-03-22 09:22:51', 29);


--
-- Data for Name: order_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO order_item VALUES (1, 4);
INSERT INTO order_item VALUES (1, 22);
INSERT INTO order_item VALUES (1, 23);
INSERT INTO order_item VALUES (1, 13);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('orders_id_seq', 1, true);


--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('product_id_seq', 25, true);


--
-- Data for Name: promotion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO promotion VALUES (2, 5, 20, '2014-03-22 00:00:00', '2014-04-22 00:00:00');


--
-- Data for Name: product_promotion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO product_promotion VALUES (8, 2);
INSERT INTO product_promotion VALUES (4, 2);


--
-- Name: promotion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('promotion_id_seq', 2, true);


--
-- Data for Name: proposedcommunity_product; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: theme_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('theme_id_seq', 6, true);


--
-- Data for Name: ticket; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: user_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO user_order VALUES (4, 1);


--
-- Data for Name: video; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- PostgreSQL database dump complete
--

