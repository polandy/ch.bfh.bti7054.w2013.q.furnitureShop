USE db_furnitureShop;

INSERT INTO role (id, name, description) VALUES (1, 'admin', 'Administrator'), (2, 'default', 'Default role');

INSERT INTO user (id, birthday, email, lastLogin, firstName, lastName, male, newsletterEnabled, password, username, roleId, address, zip, place, tel) VALUES
(1, '2013-01-01', 'hero@mailinator.com', '2013-11-11', 'Hero', 'Superman', 1, 1, 'e24b801c310567e96f84c3c33ad20e38fb10a7ac', 'hero', 1, "myStreet 1", 3512, "Walkringen", "078 897 87 45"),
(2, '2013-01-01', 'gigu@mailinator.com', '2013-11-11', 'Gigu', 'Wixxer', 1, 1, 'e24b801c310567e96f84c3c33ad20e38fb10a7ac', 'gigu', 2, "yourStreet 2", 3000, "Bern", "078 123 45 67");

INSERT INTO `category` (`id`, `name_de`, `name_en`) VALUES
(1, 'Betten', 'Bed'),
(2, 'Leuchten', 'Luminaire'),
(3, 'Sitz&ouml;bel', 'Seating furniture'),
(4, 'Schlafen', 'Sleep'),
(5, 'Tische', 'Tables');

INSERT INTO `furniture` (`id`, `basicPrice`, `description_de`, `description_en`, `name_de`, `name_en`, `categoryId`) VALUES
(2, 101, 'Eine besondere Designerlampe', 'A Special designerlamp', 'Fontana', 'Fontana', 2),
(3, 133, 'Der About A Chair AAC22 Stuhl von Hay designed von Hee Welling.\n\nDer Designer von About A Chair hatte eine Vision von der er motiviert wurde: Er wollte einen Stuhl von prÃ¤gnanter Schlichtheit entwickeln. Die Ideen und Impressionen gingen ineinander Ã¼ber und entstanden ist der About A Chair AAC22 - ein Kunstwerk der Einfachheit.\n\nDer About A Chair Stuhl sollte sowohl als NutzmÃ¶bel und als Designobjekt funktionieren. Der Grundgedanke war, dass der AAC22 Stuhl sowohl am Esstisch, am Konferenztisch, in der Kantine als auch im BÃ¼ro oder in den eigenen vier WÃ¤nden eine gute Figur macht und seinen jeweiligen Zweck erfÃ¼llt. Und das tut er mit Bravour. Er ist ein Allround-Talent und wirklich Ã¼berall einsetzbar.\n\nDurch seine Armlehnen bietet er einen hervorragenden Sitzkomfort. Die Sitzschale besteht aus durchgefÃ¤rbtem Polypropylen in den unterschiedlichsten Farben, der Rahmen ist aus Buchenholz gefertigt. Das Vierbeingestell ist entwerder in Eiche natur oder in schwarz gebeizter Esche erhÃ¤ltlich.\n\nHee Welling hat mit dem About A Chair AAC22 Stuhl eine neue Ebene des Designs erreicht und eine bequeme SitzmÃ¶glichkeit im hochwertigsten Stil erschaffen.', 'Hay ''About a Chair "AC22"'' by Hee Willing. The "About a Chair" range embodies an ideal that has motivated its designers. They desired to conceive a chair that would be pointedly simple in its design and construction. This chair was to be equally at home at the dining table and in the conference room, in the canteen and in the office, and - further - it was thus to excel both as a practical item of furniture and as a design object. With "About a Chair", its designer, Hee Welling, has aimed to achieve a higher synthesis of form, function, comfort, detail and aesthetics.', 'About a Chair AAC10', 'About a Chair AAC10', 3),
(4, 350, 'Stetig an den bestehenden Kollektionen arbeiten und den Wert der MÃ¶bel dadurch zu steigern, das ist das strategische Ziel der Fa. Bontempi schon seit Generationen.\r\nDesign verbunden mit FunktionalitÃ¤t ist die Idee der FirmengrÃ¼nder gewesen. ', 'Premium quality chair by Italian Bontempi Casa. Steel chair with removable cover in the finishes.', 'Bontempi Casa - Asia Stuhl', 'Bontempi Casa - Asia Chair', 3),
(5, 101, 'Die Stuhl Kollektion Air Chair wurde 2000 von Jasper Morrison fÃ¼r Magis entworfen.', 'The chair collection Air Chair was designed in the year 2000 by Jasper Morrison for Magis.', 'Magis Air Chair', 'Magis Air Chair', 3),
(6, 1020, 'Struktur aus fliessgepresstem Aluminium und Aluminiumdruckgussteilen poliert oder lackiert in den Farben schwarz, silberglÃ¤nzend oder dunkelgrau metalisiert. Bezug aus Polyester-gewebe mit feuerhemmendem PVC beschichtet in diversen Farben und Leder schwarz.\r\nDesign Alberto Meda\r\n', 'Polished aluminium structure with PVC covered polyester mesh seat and back.', 'Bigframe Stuhl', 'Bigframe Chair', 3),
(7, 128, 'Stefano Giovannoni ist damit bekannt geworden, dass er verspielte, humorvolle Designs mit innovativer FunktionalitÃ¤t kombinierte. Dass Giovannoni dies noch immer versteht, beweist der 2007 entstandene Stuhl First Chair, den Giovannoni fÃ¼r Magis entwarf. Chair First ist stapelbar, fÃ¼r den Innen- und AuÃŸenbereich geeignet und seine Form wirkt flieÃŸend und locker. ', 'The first entirely three-dimensional plastic chair, the Chair First is far from ordinary. Designer Stefano Giovannoni took the air-molding technology developed for the Air-Chair to the next level, creating a sophisticated, streamlined profile on a chair that is a single piece. Sturdy, durable, lightweight, stackable. Ohâ€”and comfortable too.\r\n\r\nThe light weight and stackability make these chairs perfect for dining halls, cafÃ©s, patios, and decks. As happy outdoors as inside, Chair First is available in eight colors, including fashion-forward lime green, olive green, and purple.', 'Chair First', 'Chair First', 3),
(8, 3000, 'Einzelnes Rednerpult mit Neigbarkeit und H&ouml;enverstellung oder Gruppenarbeitsplatz: aus Traversen und T&auml;gerrohren entstehen Tischl&ouml;sungen in hochstehender Formensprache.', 'A single lectern with height and angle adjustability or group workstations: table solutions are created from pillars, crossbars and support tubes in a superior language of design.', 'USM Kitos Tisch', 'USM Kitos Table', 5),
(9, 2048, 'Eleganter Esstisch, multifunktionaler Konferenztisch oder ergonomischer Arbeitsplatz â€“ der USM Haller Tisch erfÃ¼llt mit diversen Formen, Materialien und Accessoires jede Funktion.', 'An elegant dining room table, a multi-functional conference table or an ergonomic workspace â€“ the USM Haller Table fulfills every function with various forms, materials and accessories.', 'USM Haller Tisch', 'USM Haller Table', 5),
(10, 450, 'Die Selandia-Serie geht in der Formgebung auf das stolze maritime Handwerk zurÃ¼ck. Auf Details und Design wurde groÃŸe Sorgfalt verwendet - mit dem Schwerpunkt auf Bequemlichkeit, FlexibilitÃ¤t und FunktionalitÃ¤t. Selandia ist elegant und gleichzeitig praktisch, da die MÃ¶bel sich zusammenklappen lassen, wenn sie nicht in Gebrauch sind. ', 'A classic, flexible table whose length can be adapted using extension leafs. ', 'Selandia Tisch', 'Selandia Table', 5),
(11, 768, 'Durch die AusfÃ¼hrung der Struktur in Edelstahl eignet sich die gesamte Kollektion tagliatelle fÃ¼r die Nutzung im Freien, fÃ¼gt sich harmonisch in Garten- und GrÃ¼nbereiche ein. Die praktischen Tische sind durch die gefrÃ¤sten Tischplatten, in der Full Color - oder HPL WOOD Version, gekennzeichnet. Die elastischen BÃ¤nder der SitzflÃ¤che und der RÃ¼ckenlehne werden durch eine neue Farbversion: FE10 grau-Melange erweitert, raffinierte fÃ¼r den Einsatz im Innen- und Aussenbereich.', 'Thanks to the addition of the stainless steel structure, the entire tagliatelle collection is suitable for the outdoor use: by blending into the green environment, it creates an atmosphere of sophisticated relaxation. The practical tables are characterised by new milled table tops, available in Full Color white and HPL WOOD. The elastic bands forming the seat and back will be amplified by a new colour: FE10 grey melange, practical and subtle for the Indoor and Outdoor use.', 'Tagliatelle Tisch', 'Tagliatelle Table', 5),
(12, 1024, 'Muuto Split Tisch designed von Staffan Holm.\n\nDer Split Tisch ist aus massiver Eiche, massiver Esche oder schwarz gebeizt hergestellt.\n\nDer Tisch eignet sich sehr gut als Esstisch.', 'STAFFAN HOLM ON THE DESIGN â€œI wanted the table to have an organic expression and to combine a structural solidity with a seemingly more delicate balancing act. The detail of the legs being split and bent has the expression and quality of a skilled cabinet-maker and is likely to become a hallmark of the Split Table.â€', 'Muuto Split Tisch', 'Muuto Split Table', 5),
(13, 4500, 'Aus Massivholz, in zehn verschiedenen Holzarten und aus stehend verleimtem Multiplex. Ge&ouml;lt. \nOhne Metallteile konstruiert. ', 'Made of vertically glued birch multiplex or of European solid wood. Oiled. \nConstructed without metal components. ', 'Letto Bett', 'Letto Bed', 1),
(14, 5000, 'us europ&auml;ischem Massivholz, in zehn verschiedenen Holzarten und aus stehend verleimtem Multiplex. Ge&ouml;lt.\r\nOhne Metallteile konstruiert. ', 'Made of vertically glued birch multiplex or of European solid wood. Oiled.\r\nConstructed without metal components. ', 'Linea Bett, by tossa', 'Linea Bed, by tossa', 1),
(15, 650, '100% Baumwolle', '100% Cotton', 'Scholten &amp; Baijings Minimal Collecti', 'Scholten &amp; Baijings Minimal Collecti', 1),
(16, 300, 'Lattenrost aus gebogenen Buchen-Dauben, naturfarben, zusammenrollbar mit Nylon verkettet, in der Nachgiebigkeit regulierbar. ', 'no description', 'NYX Lattenrost', 'NYX Duckboard', 1),
(17, 1024, 'Hersteller: Louis Poulsen\r\nDesign: Arne Jacobsen\r\n\r\nDie Leuchte Eklipta strahlt weiches und diffuses Licht ab. Das Glas ist so konstruiert, dass es eine gleichm&auml;ssig beleuchtete Oberfl&auml;che bildet.\r\nDer mundgeblasene Glasschirm aus drei Schichten Opalglas hat eine klare Kante,\r\ndie um die Leuchte herum zu einem Glorienschein aus Licht wird.', 'The lamp emits Eklipta soft and diffuse light. The glass is constructed such that there is a evenly lit surface forms.\r\nThe hand-blown glass shade made of three layers of opal glass has a clear edge,\r\nwhich becomes a halo of light around the lamp around.', 'AJ Eklipta', 'AJ Eklipta', 2),
(18, 2048, 'Die runden Pendelleuchten Akari 45A, 55A, 75A und 120A (mit einem Durchmesser von 120 cm) sind Entw&uuml;rfe von Isamu Noguchi und Bestandteil der Akari Kollektion von Vitra.', '\r\nThe round pendant lamps Akari 45A, 55A, 75A and 120A (with a diameter of 120 cm) are designs of Isamu Noguchi and part of the Akari collection of Vitra.', 'Akari 45A (Pendelleuchte) by Isamu Noguc', 'Akari 45A (Pendant lamps) by Isamu Noguc', 2),
(19, 512, 'Tolomeo Tischleuchte, der Klassiker', 'The Tolomeo incandescent desk lamp is an icon of Italian modern design. It was designed by Michele De Lucchi and Giancarlo Fassina in 1986 for the Artemide company. In its original configuration, it consists of a heavy base, two straight polished aluminum arm sections (each approximately 45 cm long), and a matte aluminum reflector head which can swivel 360&deg;. Steel tension cables attached to springs hidden inside the arms complete the constant-tension structure. Tolomeo is the Italian version of the name Ptolemy. In the dot-com period, it became popular as a symbol of conspicuous consumption and high design consciousness in high-tech companies as well as in architectural and graphic design offices. It won the Compasso d''Oro design prize in 1989.', 'Artemide Tolomeo', 'Artemide Tolomeo', 2),
(20, 128, 'Belux Arba: Behagliches Licht aus der Natur Zeitlos und doch modern: Die Belux Arba vereint klassisches Design mit pfiffigen, umweltfreundlichen Materialien. Zeitlose &Auml;sthetik, innovatives Material: FSC-zertifiziertes Ahornholz verleiht der Belux Arba Pendelleuchte ihren einzigartigen, nat&uuml;rlichen Look. Die ausgepr&auml;gte Maserung unterstreicht die klassische Form der Lampe. Mit der Zeit dunkelt das nat&uuml;rliche Material etwas nach und sorgt f&uuml;r eine besonders ausdrucksvolle Optik. Seine Flexibilit&auml;t und Stabilit&auml;t erh&auml;lt das Holz der Arba H&auml;ngeleuchte durch eine umweltfreundliche Behandlung mit &Ouml;l. Dank energieeffizienter Leuchtstofflampen sowie moderner Beleuchtungselektronik ist die Belux Arba nach Minergie-Standard zertifiziert, ohne dabei Abstriche bei der Atmosph&auml;re zu machen: Das &ouml;kologiefreundliche Ahornholz wirft selbst k&uuml;hles Licht in einem behaglichen und dennoch hellen Ton zur&uuml;ck. Einen zus&auml;tzlichen Blickfang bietet die Belux Arba mit ihrem feuerroten, textilen Stromkabel. Ein Diffusor aus massivem Acrylglas sorgt f&uuml;r das ausgewogene, auch vertikal blendungsarme Licht der Belux Arba. Damit ist die Arba H&auml;ngeleuchte ideal zur Beleuchtung des Essbereichs: Mit einem Durchmesser von 60 cm eignet sich die Belux Arba besonders zum Ausleuchten mittlerer bis gr&ouml;&szlig;erer Tische. Durch ihr stabiles, hochwertig verarbeitetes Material ist die Belux Arba ausgesprochen langlebig. Auch die moderne Elektronik sowie die energieeffizienten Leuchtmittel gen&uuml;gen h&ouml;chsten Anspr&uuml;chen in puncto Lebensdauer. Insgesamt pr&auml;sentiert sich die Belux Arba damit als besonders umweltfreundliches, nachhaltiges Produkt. Gestaltet wurde die Belux Arba von Matteo Thun. Der italienische Architekt und Produktdesigner legt bei all seinen Entw&uuml;rfen besonderen Wert auf lange Lebensdauer und Nachhaltigkeit, sowohl beim Design als auch aus &ouml;konomischer und technischer Sicht. Diese Philosophie hat Thun auch im Fall der Belux Arba verwirklicht.', 'Belux Arba : Comfortable light from nature Timeless yet modern : The Belux Arba combines classic design with smart , environmentally friendly materials. Timeless aesthetics , innovative materials : FSC -certified maple gives the Belux Arba pendant lamp its unique , natural look. The pronounced grain highlights the classic shape of the lamp. Over time, the natural material darkens slightly and makes for a particularly expressive appearance. Its flexibility and stability gets the wood of the arba pendant lamp with an environmentally friendly treatment with oil. Thanks to energy-efficient fluorescent lamps and modern lighting electronics Belux Arba is certified to Minergie standard without compromising the atmosphere : The ecology friendly maple throws himself cool light , in a cozy , yet bright tone back . An additional eye-catching offers the Belux Arba with her fiery red , textile power cord. A diffuser made â€‹â€‹of solid acrylic glass ensures the balanced , vertically glare poor light the Belux Arba . In order for the Arba hanging lamp is ideal for lighting the dining area : With a diameter of 60 cm , the Belux Arba is particularly suitable for illuminating medium to large tables . Due to its stable , high-quality processed material Belux Arba is extremely durable. The modern electronics and the energy-efficient bulbs meet the highest demands in terms of durability. Overall, the Belux Arba presented , making it exceptionally environmentally sustainable product . Was designed Belux Arba by Matteo Thun. The Italian architect and product designer uses in all of his designs special emphasis on durability and sustainability , both in the design as well as from an economic and technical point of view . This philosophy has also implemented in the case of Belux Arba Thun.', 'Belux Arba', 'Belux Arba', 2);

INSERT INTO `feature` (`id`, `extraPrice`, `name_de`, `name_en`, `furnitureId`) VALUES
(1, 1500, 'Birkenholz', 'Birch', 13);

INSERT INTO paymentmethod (name_de, name_en) VALUES
('Bar bei Abholung', 'Cash on pick-up'),
('Rechnung', 'Bill');