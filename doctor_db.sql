-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 08:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_table`
--

CREATE TABLE `about_table` (
  `about_id` int(11) NOT NULL,
  `about_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_table`
--

INSERT INTO `about_table` (`about_id`, `about_details`) VALUES
(1, 'GET A WORLD CLASS HEALTH SERVICE. Medico has all the characteristics of a world-class hospital with wide range of services and specialists and technology, ambience and service quality. Medico is a showcase of synergy of medical technology and advances in ICT Division through paperless medical records. The skilled doctors, technologists and administrators of Medico, provide a congenial infrastructure for the medical professionals in providing healthcare of international standards.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(300) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `action`, `image`) VALUES
(1, 'Medico', 'medico.sn21@gmail.com', '12', 0, ''),
(2, 'admin', 'admin@gmail.com', '12', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `appointment_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `appointment_date` varchar(200) NOT NULL,
  `appointment_day` varchar(100) NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `booking` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`appointment_id`, `od_id`, `appointment_date`, `appointment_day`, `appointment_time`, `booking`) VALUES
(26, 36, '2021-03-25', 'Wednesday', '11AM-12PM', 0),
(27, 32, '2021-03-30', 'Tuesday', '7PM-8PM', 0),
(28, 29, '2021-03-28', 'Sunday', '2PM-3PM', 0),
(29, 35, '2021-03-31', 'Wednesday', '2PM-3PM', 0),
(31, 34, '2021-03-30', 'Tuesday', '11AM-12PM', 0),
(32, 31, '2021-03-29', 'Monday', '2PM-3PM', 0),
(33, 30, '2021-03-29', 'Monday', '7PM-8PM', 0),
(34, 33, '2021-03-31', 'Wednesday', '11AM-12PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogcat_table`
--

CREATE TABLE `blogcat_table` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogcat_table`
--

INSERT INTO `blogcat_table` (`cat_id`, `cat_name`) VALUES
(16, 'Covid 19'),
(17, 'Migraine'),
(18, 'Health and Nutrition'),
(19, 'Meditation');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment_table`
--

CREATE TABLE `blogcomment_table` (
  `com_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_table`
--

CREATE TABLE `blog_table` (
  `blog_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `blog_title` varchar(266) NOT NULL,
  `blog_post` text NOT NULL,
  `blog_image` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_table`
--

INSERT INTO `blog_table` (`blog_id`, `cat_id`, `blog_title`, `blog_post`, `blog_image`, `date`) VALUES
(18, 17, '<h2>7 WAYS TO SURVIVE MIGRAINES</h2>', '<p>Searching for a cure for your migraines can make you want to bang your head against the wall. Most preventive meds were originally developed to treat other conditions (like depression or epilepsy) and can have unwanted side effects&mdash;if they have any effect at all. As a result, many migraineurs (yes, it&rsquo;s a word) experiment with treatments. That&rsquo;s what Lisa Jacobson did for 25 years, during which time she figures she endured some 9,000 migraines. Slowly, through painstaking trial and error, and with constant vigilance, she tweaked and refined her strategy&mdash;until, three years ago, her daily head pain disappeared. For months. Now when the occasional migraine strikes, she knows how to manage it. We asked Jacobson, 58, founder of the support site The Daily Migraine, to share what she&rsquo;s learned.</p>\r\n\r\n<p><strong>1. Your Journal Is Your Bible</strong><br>Years ago, Jacobson&rsquo;s neurologist advised her to track her migraines. &ldquo;One day I looked over my journal and noticed that all my migraine-free days occurred on vacation,&rdquo; she says. &ldquo;My doctor agreed it probably meant stress was a key trigger.&rdquo; Jacobson still relies on her diary to identify triggers, as well as figure out her most effective remedies.</p>\r\n\r\n<p><strong>2. Stress Is Enemy Number One</strong><br>&ldquo;There are direct connections between parts of the brain that control emotion and the pain pathways activated during a migraine, which means that stress, anxiety, and depression can bring on attacks,&rdquo; says Rashmi Halker Singh, MD, a neurologist at the Mayo Clinic in Phoenix. When Jacobson feels overwhelmed, she practices deep breathing or does a 30-second meditation. If she starts getting a migraine, she retreats to a dark room. Some migraineurs are prescribed antianxiety medication or cognitive-behavioral therapy to cope with stress.</p>\r\n\r\n<p><strong>3. Drugs Can Help, But There&rsquo;s No Magic Pill</strong><br>If a headache feels imminent, Jacobson retaliates with a triptan. These stopgap prescription meds, like Imitrex, Maxalt, or Zomig, bind to serotonin receptors that are found in the pain pathways responsible for migraines, explains Halker Singh. When Jacobson takes one at the first sign of an attack, it reliably gives her 24 hours of relief. But using triptans too frequently can cause rebound headaches, so she limits herself to two a week.</p>\r\n\r\n<p><strong>4. Turtlenecks Are a Migraine Don&rsquo;t</strong><br>For Jacobson, getting too hot is a trigger, so she always dresses in layers she can easily remove. &ldquo;I own probably 20 cardigans, in every color.&rdquo;</p>\r\n\r\n<p><strong>5. It&rsquo;s Okay to Wear Ice Packs on Your Head</strong><br>One of Jacobson&rsquo;s warning signs is a feeling of pressure behind one eye; she&rsquo;s found that when it hits, putting ice on her head can stave off the pain. She teamed with a friend to develop the Migraine Hat, a snug beanie with compartments for ice packs.</p>\r\n\r\n<p><strong>6. Nothing Tastes as Good as a Clear Head Feels</strong><br>Jacobson doesn&rsquo;t consume aged cheese, sugar, white flour, alcohol, or MSG. &ldquo;I think eating whole, unprocessed foods has made me less prone to migraines,&rdquo; she says.</p>\r\n\r\n<p><strong>7. Normal Is Worth Celebrating</strong><br>&ldquo;I try not to worry when the next migraine will hit and instead revel in every moment without pain,&rdquo; Jacobson says. Bonus: Choosing to feel grateful instead of on guard helps keep stress&mdash;and pain&mdash;at bay.</p>\r\n\r\n<p><strong>8. Not Just a Headache</strong><br>A migraine is a neurological disorder that is largely inherited and characterized by overexcitability of specific areas of the brain.</p>', 'img/a6cf94f6f4.jpg', '2021-02-14 08:05:54'),
(20, 18, '<h2>5 FOODS THAT ARE MAKING YOU SLEEPY</h2>', '<p><strong>1. Your Sad Desk Salads</strong><br>&ldquo;I worry when a client comes in and says that she just has a salad for lunch,&rdquo; says Elisabetta Politi, RD, MPH, Nutrition Director at the Duke Diet and Fitness Center in Durham, North Carolina. Why? Because a salad could just mean a helping of iceberg lettuce, some shaved carrots and Ranch dressing. And loading your bowl with veggies and skimping on protein and carbs means you&rsquo;re not getting enough calories to power you through the rest of your day. &ldquo;If you&rsquo;re eating a 200-calorie pile of broccoli and lettuce, it&rsquo;s no wonder you feel hungry and tired at 4 p.m.,&rdquo; Politi says. Your dressing of choice could be adding to the problem. &ldquo;You might think you&rsquo;re doing the right thing by eating a salad, but if you add a dressing like honey mustard or raspberry vinaigrette, both of which are usually high in added sugar, that&rsquo;ll probably lead to an energy crash later,&rdquo; says Marisa Moore, RD, spokesperson for the Academy of Nutrition and Dietetics.<br><strong>Pick Yourself Up:</strong> Make a base of non-starchy vegetables like mushrooms, cauliflower or peppers and leafy greens like kale, then add protein like chicken or chickpeas and complex carbohydrates like quinoa or edamame that&rsquo;ll give you slow-burning energy. As for dressing, try the extra virgin olive oil and vinegar or lemon juice.</p>\r\n\r\n<p><strong>2. String Cheese and Yogurt</strong><br>Sad but true: Dairy could be behind your fatigue. You may have digested it just fine when you were younger, but intolerances to the proteins in dairy (casein and whey) can develop as we age, and tiredness is a hallmark symptom. &ldquo;At least 50 to 60 percent of my patients complain of fatigue, and I would estimate that 20 to 30 percent of those people feel better off dairy,&rdquo; says Lyla Blake-Gumbs, MD, from the Center for Integrative Medicine at the Cleveland Clinic. (The mechanism isn&rsquo;t entirely clear, but it&rsquo;s believed that the body mistakenly develops an immunological reaction to the proteins, building an army of antibodies to mobilize against the proteins whenever they show up, resulting in fatigue.) Fatigue isn&rsquo;t usually the only symptom, but it&rsquo;s possible for it to present without GI problems, says Blake-Gumbs, which is why few people connect the dots to their diet. &ldquo;Dairy is ubiquitous in our food supply,&rdquo; she says. &ldquo;And a lot of processed foods that you wouldn&rsquo;t think of as dairy have milk solids and proteins in them. For example, anything with caramel flavoring likely has dairy additives in it.&rdquo;<br><strong>Pick Yourself Up:</strong> If you notice an energy lag after you eat dairy, talk to your doctor about going on an elimination diet, a method that Blake-Gumbs often uses with patients in which all potential culprits are removed from your diet, then reintroduced one at a time to see which one is causing the problem.</p>\r\n\r\n<p><strong>3. Bananas or Nuts</strong><br>There&rsquo;s a reason bananas are often presented as a fix for muscle cramps: They&rsquo;re high in magnesium, a mineral that helps relax muscle cells. &ldquo;We give people magnesium at night to help them sleep,&rdquo; says Blake-Gumbs. Another magnesium source? Nuts, particularly almonds, cashews and peanuts. The dosage that&rsquo;ll make someone tired is different for everyone, but you&rsquo;re more likely to feel the effects if you&rsquo;re too low on magnesium to start with.<br><strong>Pick Yourself Up:</strong> As long as you&rsquo;re not deficient in magnesium, you should be fine to eat either bananas or nuts on their own. Symptoms of a magnesium deficiency (according to the most recent National Health And Nutrition Survey that examined magnesium intake, nearly half of all Americans aren&rsquo;t meeting recommended levels) include loss of appetite, nausea and fatigue, and those with type 2 diabetes, gastrointestinal disorders or celiac disease are at particularly high risk.</p>\r\n\r\n<p><strong>4. Last Night&rsquo;s Late Dinner</strong><br>Sometimes crazy days mean that your last meal comes right before bedtime. But just as the right foods can help you drift off into deep, restorative slumber, the wrong ones can result in a poor night&rsquo;s sleep, leaving you dragging the next day. Among the culprits: acidic foods like meat, eggs and dairy that can lead to nighttime acid reflux. &ldquo;If you eat something acidic within two hours of going to bed, it&rsquo;ll probably still be in your stomach and could cause some gastroesophageal reflux,&rdquo; says Blake-Gumbs. &ldquo;If you&rsquo;re someone who deals with acid reflux often, you shouldn&rsquo;t be eating those foods even four hours before you go to bed.&rdquo;<br><strong>Pick Yourself Up:</strong> When you just can&rsquo;t avoid eating close to bedtime, stick with non-acidic, or alkaline, foods like fruits, vegetables, whole grains, and nuts like almonds, which won&rsquo;t cause sleep-disrupting GI issues.</p>\r\n\r\n<p><strong>5. That Occasional Sugary or Fatty Indulgence</strong><br>Here&rsquo;s one downside to a super-nutritious diet&mdash;when you decide to treat yourself, your body likely won&rsquo;t handle it very well. &ldquo;Research indicates that our gastrointestinal tract adjusts to what we eat,&rdquo; Politi says. &ldquo;If you&rsquo;re sticking to a low-fat, low-sugar diet, you start to produce less of the gastric juices and enzymes that help digest sugar and fat easily.&rdquo; And that doesn&rsquo;t just spell digestive trouble; it can lower your energy afterward, too, likely more so than if you&rsquo;d been eating less-than-superbly all along. Politi knows this firsthand. As a nutritionist, her own diet is the kind we all aspire to, and when she occasionally has a slice of cake at her office&rsquo;s monthly employee birthday parties, &ldquo;I feel so lousy, like I need to take a nap immediately,&rdquo; she says.<br><strong>Pick Yourself Up:</strong> No one&rsquo;s advocating total treat deprivation, but when you decide it&rsquo;s time for something more sugary or fattening than you typically eat, just be prepared for the slump that may follow.</p>', 'img/6239492509.jpg', '2021-02-14 08:21:54'),
(21, 19, '<h2>FEELING DOWN? 3 WAYS TO CHANGE YOUR MOOD IN 60 SECONDS</h2>', '<p>These mini meditations are the ideal way to get in little hits of focus, calm and joy throughout your day. We made all of these short, sweet and doable in under five minutes, to make it easy for you to work them into your day.</p>\r\n\r\n<p><strong>Mood Lifter Meditation</strong><br>Time it takes: 1 minute Ideal for: Shifting out of a bad mood Try this when: You&rsquo;re feeling sad, toxic or annoyed</p>\r\n\r\n<p>Gratitude is the instant antidote for a bad mood. You literally cannot feel grumpy and grateful at the same time. Here&rsquo;s how to go from feeling icky to inspired in under 60 seconds.</p>\r\n\r\n<p>1. Close your eyes.</p>\r\n\r\n<p>2. Think of three people or things you are grateful for. Don&rsquo;t phone this in! You want to choose three things you genuinely feel grateful for. It might be someone special in your life, someone who gave up their seat for you on a crowded subway, your kids&rsquo; health, that it&rsquo;s not raining today&#8230;it doesn&rsquo;t matter whether it&rsquo;s big or small&mdash;it all counts. Coffee is sometimes on my list, for instance.</p>\r\n\r\n<p>3. Open your eyes.</p>\r\n\r\n<p>Done! It&rsquo;s that easy.</p>\r\n\r\n<p><strong>The Obsession Obliterator Meditation</strong><br>Time it takes: 1 to 3 minutes Ideal for: Breaking free from mental spirals Use this when: Something is bugging you and you just CAN&rsquo;T LET IT GO</p>\r\n\r\n<p>We all have stuff we obsess over. Mistakes we&rsquo;ve made, feeling fat, worrying about something at work&#8230;it can be hard to let these things go, but you&rsquo;re now trained to do exactly that! You&rsquo;ve worked that muscle of redirect, and this mini guided-imagery meditation will help you move that along even faster.</p>\r\n\r\n<p>Here&rsquo;s what to do next time you can&rsquo;t seem to stop ruminating on something:</p>\r\n\r\n<p>1. Close your eyes and think about what you&rsquo;re obsessing over (not hard, right?).</p>\r\n\r\n<p>2. Picture a computer screen, with your hand on a mouse or track pad. Direct the arrow to the topic in your imagination and click on it.</p>\r\n\r\n<p>3. Imagine dragging that item to your Trash folder. Literally see it get sucked into the digital trash bin.</p>\r\n\r\n<p>4. Now hit Empty Trash.</p>\r\n\r\n<p>5. Imagine a blank, clean, clear page appearing on the screen, and breathe.</p>\r\n\r\n<p>6. If a pop-up of the topic reappears, simply view, drag to Trash and repeat.</p>\r\n\r\n<p><strong>The Traffic Meditation</strong><br>Time it takes: 1 to 3 minutes (can be repeated as many times as needed) Ideal for: Dissolving frustration, stress and road rage Use this when: You&rsquo;re in traffic hell</p>\r\n\r\n<p>Here&rsquo;s our remedy for those times when you see an endless stream of stopped cars ahead of you and start to feel your blood boil. It&rsquo;s literally as easy as A, B, C:</p>\r\n\r\n<p>1. A = Attention to the road. Focus on the situation and register complete awareness of the situation, with as much detail as you can. For example: I am in bumper-to-bumper traffic; I am not moving; I am stuck; I am going to be late and I hate being late; I am miserable.</p>\r\n\r\n<p>2. B = Body scan. Starting with your feet, scan your entire body to ground yourself. Feel your feet on the pedals, your rear in the seat, your hands on the wheel and your eyes&rsquo; gaze on the road.</p>\r\n\r\n<p>3. C = Connect with your breath. First, breath in and out deeply and slowly, in through your nose and out through your mouth. Then, place your attention on your rib cage and inhale to a count of four, feeling it swell. Hold for a count of four, then exhale to a count of four, feeling your rib cage deflate. Count to four and repeat the process a few more times, until you feel yourself relax.</p>\r\n\r\n<p>After your ABCs, repeat the mantra It is what it is three times, either silently or out loud. The traffic may not disappear but your agitation will.</p>', 'img/a9590c0c0a.jpg', '2021-02-14 08:25:55'),
(22, 18, '<h2>10 HEALTH AND NUTRITION TIPS THAT ARE ACTUALLY EVIDENCE-BASED</h2>', '<p>There is a lot of confusion when it comes to health and nutrition. People, even qualified experts, often seem to have the exact opposite opinions. However, despite all the disagreements, there are a few things that are well supported by research. Here are 27 health and nutrition tips that are actually based on good science.</p>\r\n\r\n<p><strong>1. Don’t Drink Sugar Calories</strong><br>Sugary drinks are the most fattening things you can put into your body. This is because liquid sugar calories don’t get registered by the brain in the same way as calories from solid foods. For this reason, when you drink soda, you end up eating more total calories. Sugary drinks are strongly associated with obesity, type 2 diabetes, heart disease and all sorts of health problems. Keep in mind that fruit juices are almost as bad as soda in this regard. They contain just as much sugar, and the small amounts of antioxidants do NOT negate the harmful effects of the sugar.</p>\r\n\r\n<p><strong>2. Eat Nuts</strong><br>Despite being high in fat, nuts are incredibly nutritious and healthy. They are loaded with magnesium, vitamin E, fiber and various other nutrients. Studies show that nuts can help you lose weight, and may help fight type 2 diabetes and heart disease. Additionally, about 10-15% of the calories in nuts aren’t even absorbed into the body, and some evidence suggests that they can boost metabolism. In one study, almonds were shown to increase weight loss by 62% compared to complex carbohydrates.</p>\r\n\r\n<p><strong>3. Avoid Processed Junk Food (Eat Real Food Instead)</strong><br>All the processed junk foods in the diet are the biggest reason the world is fatter and sicker than ever before. These foods have been engineered to be “hyper-rewarding,” so they trick our brains into eating more than we need, even leading to addiction in some people. They are also low in fiber, protein and micronutrients (empty calories), but high in unhealthy ingredients like added sugar and refined grains.</p>\r\n\r\n<p><strong>4. Don’t Fear Coffee</strong><br>Coffee has been unfairly demonized. The truth is that it’s actually very healthy. Coffee is high in antioxidants, and studies show that coffee drinkers live longer, and have a reduced risk of type 2 diabetes, Parkinson’s disease, Alzheimer’s and numerous other diseases.</p>\r\n\r\n<p><strong>5. Eat Fatty Fish</strong><br>Pretty much everyone agrees that fish is healthy. This is particularly true of fatty fish, like salmon, which is loaded with omega-3 fatty acids and various other nutrients. Studies show that people who eat the most fish have a lower risk of all sorts of diseases, including heart disease, dementia and depression.</p>\r\n\r\n<p><strong>6. Get Enough Sleep</strong><br>The importance of getting enough quality sleep can not be overstated. It may be just as important as diet and exercise, if not more. Poor sleep can drive insulin resistance, throw your appetite hormones out of whack and reduce your physical and mental performance. What’s more, it is one of the strongest individual risk factors for future weight gain and obesity. One study showed that short sleep was linked to 89% increased risk of obesity in children, and 55% in adults.</p>\r\n\r\n<p><strong>7. Take Care of Your Gut Health With Probiotics and Fiber</strong><br>The bacteria in your gut, collectively called the gut microbiota, are sometimes referred to as the “forgotten organ.” These gut bugs are incredibly important for all sorts of health-related aspects. A disruption in the gut bacteria is linked to some of the world’s most serious chronic diseases, including obesity. A good way to improve gut health, is to eat probiotic foods (like live yogurt and sauerkraut), take probiotic supplements, and eat plenty of fiber. Fiber functions as fuel for the gut bacteria.</p>\r\n\r\n<p><strong>8. Drink Some Water, Especially Before Meals</strong><br>Drinking enough water can have numerous benefits. One important factor, is that it can help boost the amount of calories you burn. According to 2 studies, it can boost metabolism by 24-30% over a period of 1-1.5 hours. This can amount to 96 additional calories burned if you drink 2 liters (67 oz) of water per day. The best time to drink water is half an hour before meals. One study showed that half a liter of water, 30 minutes before each meal, increased weight loss by 44%.</p>\r\n\r\n<p><strong>9. Don’t Overcook or Burn Your Meat</strong><br>Meat can be a nutritious and healthy part of the diet. It is very high in protein, and contains various important nutrients. The problems occur when meat is overcooked and burnt. This can lead to the formation of harmful compounds that raise the risk of cancer. So, eat your meat, just don’t overcook or burn it.</p>\r\n\r\n<p><strong>10. Avoid Bright Lights Before Sleep</strong><br>When we’re exposed to bright lights in the evening, this disrupts production of the sleep hormone melatonin. An interesting “hack” is to use a pair of amber-tinted glasses that block blue light from entering your eyes in the evening. This allows melatonin to be produced as if it were completely dark, helping you sleep better.</p>', 'img/332d2ffacb.jpg', '2021-02-19 05:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `bookappoinment`
--

CREATE TABLE `bookappoinment` (
  `book_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_email` varchar(300) NOT NULL,
  `customer_phone` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_table`
--

CREATE TABLE `clinic_table` (
  `clinic_id` int(11) NOT NULL,
  `clinic_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_table`
--

INSERT INTO `clinic_table` (`clinic_id`, `clinic_name`) VALUES
(1, 'Labaid(Dhanmondi)'),
(3, 'Medinova(Dhanmondi)'),
(4, 'Popular(Dhanmondi)'),
(6, 'Padma(Malibagh)'),
(7, 'PG Hospital'),
(8, 'Delta Hospital (Mirpur-10,Dhaka)'),
(9, 'BANGLADESH SPECIALIZED HOSPITAL (Shyamoli, Mirpur Road)');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `com_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `od_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(266) NOT NULL,
  `c_email` varchar(266) NOT NULL,
  `c_subject` varchar(266) NOT NULL,
  `c_message` varchar(500) NOT NULL,
  `seen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_email` varchar(300) NOT NULL,
  `customer_password` varchar(300) NOT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `image` varchar(266) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_gender` varchar(100) NOT NULL,
  `customer_birth` varchar(200) NOT NULL,
  `customer_blood` varchar(300) NOT NULL,
  `block` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `image`, `customer_address`, `customer_gender`, `customer_birth`, `customer_blood`, `block`) VALUES
(16, 'suvo', 'subho@gmail.com', '12', '01681606519', 'img_new/3097cabd7a.jpg', '68 wari', 'Male', '1994-11-06', 'B+', 0),
(18, 'piu', 'piu@gmail.com', '12', '01658951202', 'img_new/cc3019e855.jpeg', '68 wari', 'Female', '2004-01-22', 'B+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_table`
--

CREATE TABLE `department_table` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(250) NOT NULL,
  `d_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_table`
--

INSERT INTO `department_table` (`d_id`, `d_name`, `d_description`) VALUES
(5, 'Better Doctor', 'You can easily find here the famous & specialized  doctors,who always provide you the best health services'),
(6, 'Better Consultancy', 'You can communicate with our expert doctors very easily and take any kind of consultancy as your need,cause we have 24 hours support team for your consultancy service.'),
(7, 'Better Appoinments', 'You can easily take an appoinment to your desired doctors through our management team,who provides you the schedule of the doctors.'),
(8, 'Better Blood', 'We have huge nember of  registered members of in our websites,who are willing to donate blood.so you can easily find your desired blood samples from these websites.');

-- --------------------------------------------------------

--
-- Table structure for table `dept_table`
--

CREATE TABLE `dept_table` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_table`
--

INSERT INTO `dept_table` (`dept_id`, `dept_name`) VALUES
(1, 'Eye'),
(2, 'Medicine'),
(4, 'Gayne'),
(7, 'Neurology'),
(10, 'Food & Nutrition'),
(12, 'Skin & VD'),
(13, 'Orthopedic & Trauma'),
(15, 'Oncology'),
(19, 'ENT');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE `doctor_table` (
  `doctor_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `doctor_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`doctor_id`, `clinic_id`, `doctor_name`) VALUES
(12, 1, 'PROF. DR, MD. ABDUL MANNAN (Cardiology, Friday 10:00AM-12:00PM)'),
(14, 1, 'Prof. (Dr.) Md. Ashraf Ali (Neurology  9.00AM-7.00 PM)'),
(15, 1, 'Dr. Hasna Fahmima Haque (Medicine, Monday, Wednesday & Thursday 4.00pm-6.30pm)'),
(16, 1, 'Dr. Riaz Uddin (Skin, Friday 5.00Pm-8.00Pm)'),
(17, 1, 'DR KANIZ FATEMA (Gynecology & Obstetrics, Friday 11:00AM-2:30PM)'),
(18, 3, 'Lt. Col. Dr. Md. Abdullah Hill Kafi (ENT, Friday 10:00AM-12:00PM)'),
(19, 3, 'Dr. Nusrat Rahman (Gynecology & Obstetrics, Wednesday 4.00pm-6.30pm)'),
(20, 3, 'Professor Dr. Shamsun Nahar (Physical Medicine, Thursday 4.00pm-6.30pm)'),
(21, 4, 'PROF. (DR.) MANABENDRA NATH NAG (MEDICINE, Saturday-Friday 5:00 PM – 8:00 PM)'),
(22, 4, 'DR. RAJASHISH CHAKRABORTY (CHEST MEDICINE, Thursday 4PM-7PM)'),
(23, 4, 'PROF. DR. MOINUL HOSSAIN (PAIN SPECIALIST, Saturday-Wednesday 8PM-10PM)'),
(24, 6, 'Prof. Dr. Mir Jamal Uddin (Cardiology, Monday 5.00Pm-8.00Pm)'),
(25, 6, 'Dr. Shamima Sultana (Gyne & Obs, Saturday-Thursday 5.00Pm-8.00Pm)');

-- --------------------------------------------------------

--
-- Table structure for table `dr_msg_table`
--

CREATE TABLE `dr_msg_table` (
  `drmsg_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `message_doctor` text NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE `friend_list` (
  `friend_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sendmsgtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_table`
--

CREATE TABLE `message_table` (
  `msg_id` int(11) NOT NULL,
  `message_p` text NOT NULL,
  `image_p` varchar(300) NOT NULL,
  `message_d` text NOT NULL,
  `image_d` varchar(300) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `msgtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `office_table`
--

CREATE TABLE `office_table` (
  `id` int(11) NOT NULL,
  `o_address` varchar(266) NOT NULL,
  `o_phone` varchar(266) NOT NULL,
  `o_email` varchar(266) NOT NULL,
  `o_address_one` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_table`
--

INSERT INTO `office_table` (`id`, `o_address`, `o_phone`, `o_email`, `o_address_one`) VALUES
(1, '46 no Bonograme Lane, Wari', '01681606519', 'medico.sn21@gmail.com\r\n', 'Dhaka - 1203');

-- --------------------------------------------------------

--
-- Table structure for table `our_doctor_table`
--

CREATE TABLE `our_doctor_table` (
  `od_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `od_name` varchar(300) NOT NULL,
  `od_email` varchar(300) NOT NULL,
  `od_dept` varchar(300) NOT NULL,
  `od_image` varchar(300) NOT NULL,
  `od_skype` varchar(200) NOT NULL,
  `od_phone` varchar(200) NOT NULL,
  `od_desc` text NOT NULL,
  `od_pass` varchar(300) NOT NULL,
  `od_fee` int(11) NOT NULL,
  `od_valid` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_doctor_table`
--

INSERT INTO `our_doctor_table` (`od_id`, `dept_id`, `od_name`, `od_email`, `od_dept`, `od_image`, `od_skype`, `od_phone`, `od_desc`, `od_pass`, `od_fee`, `od_valid`) VALUES
(29, 15, 'DR. MD. ARIFUR RAHMAN', 'arifur@gmail.com', '', 'img/1135201ecd.jpg', 'arifur98', '01695123486', '<p>Special Training in High Precision Radiotherapy<p>\r\n<p>Associate Consultant<p>\r\n<p>Oncology & Radiotherapy<p>\r\n<p>Bangladesh Specialized Hospital<p>', '12', 3500, 'doc/1135201ecd.pdf'),
(30, 2, 'Maj. Gen.(Retd) Dr. M.A. Moyeed Siddiqui', 'moyeed@gmail.com', '', 'img/8a1a6be285.jpg', 'moyeed89', '01681564925', '<p>MBBS, MCPS, FCPS(BD),FCPS(PAK)<p>\r\n<p>Specialist in Medicine, Gastroenterology & Liver Disease<p>\r\n<p>Consultant Physician General & Professor of Medicine<p>\r\n<p>Ex. Director General Medical Services,<p>\r\n<p>Bangladesh Armed Forces.<p>', '12', 4000, 'doc/8a1a6be285.pdf'),
(31, 4, 'Prof. Dr. Saria Tasnim', 'saria@gmail.com', '', 'img/42431d4b8a.jpg', 'saria98', '01681695231', '<p>MBBS, FCPS, MS Medical Education Diploma<p>\r\n<p>Community Epidemiology<p>\r\n<p>Professor & Head of The Department (Gynae & Obs)<p>\r\n<p>Dhaka Community Hospital<p>', '12', 4000, 'doc/42431d4b8a.pdf'),
(32, 12, 'Dr. Mehran Hossain', 'mehran@gmail.com', '', 'img/4d13cf1922.png', 'mehran89', '01681564925', '<p>MBBS (Dhaka), DDV (BSMMU)<p>\r\n<p>Trained in Aesthetic Surgery<p>\r\n<p>(Bangkok, Thailand)<p>\r\n<p>Consultant- Skin, Allergy & Sex Specialist<p>\r\n<p>Asistant Professor- U.S Bangla Medical College & Hospital<p>\r\n<p>Physician – Bangladesh National Cricket Board<p>\r\n<p>Consultant : City Hospital Ltd.<p>', '12', 3500, 'doc/4d13cf1922.pdf'),
(33, 1, 'Dr. Jinia Afrin', 'jinia@gmail.com', '', 'img/8303db73ba.jpg', 'jinia88', '01681564925', '<p>MBBS(Dhaka), DO(NIO),<p>\r\n<p>Eye Specialist & Surgeon, NIOH, Dhaka.<p>\r\n<p>Consultant, Green Eye Hospital, Dhanmondi, Dhaka.<p>', '12', 3000, 'doc/8303db73ba.pdf'),
(34, 7, 'PROF. DR.ABU NASIR RIZVI', 'rizvi@gmail.com', '', 'img/de578ec170.png', 'rizvi45', '01695123486', '<p>NEUROLOGY Specialist<p>\r\n<p>MBBS, MD (Neurology) Professor<p>\r\n<p>Dept. Of Neuro-Medicine BSMMU, DHAKA<p>', '12', 4500, 'doc/de578ec170.pdf'),
(35, 13, 'DR. G. M. JAHANGIR HOSSAIN', 'jahangir@gmail.com', '', 'img/1b27d7ebb4.jpg', 'jahangir45', '01695123486', '<p>ASSISTANT PROFESSOR<p>\r\n<p>NATIONAL INSTITUTE OF TRAUMATOLOGY AND ORTHOPAEDIC REHABILITATION (NITOR), DHAKA<p>\r\n<p>Arthroscopy & Sports Trauma<p>\r\n<p>(India, Thailand, Korea & Taiwan)<p>', '12', 5000, 'doc/1b27d7ebb4.pdf'),
(36, 19, 'Dr. Zakia Mahmood', 'zakia@gmail.com', '', 'img/44f6b7223b.png', 'zakia45', '01681564925', '<p>Degree : MBBS (DU), MHSM & Plan (Aus.)<p>\r\n<p>Speciality : ENT<p>', '12', 3000, 'doc/44f6b7223b.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(266) NOT NULL,
  `p_email` varchar(266) NOT NULL,
  `p_phone` varchar(266) NOT NULL,
  `p_image` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `serial_table`
--

CREATE TABLE `serial_table` (
  `serial_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `location_id_withtime` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_comment` text NOT NULL,
  `bookingtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thirdparty_table`
--

CREATE TABLE `thirdparty_table` (
  `third_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `issueat` varchar(300) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_table`
--
ALTER TABLE `about_table`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `blogcat_table`
--
ALTER TABLE `blogcat_table`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `blogcomment_table`
--
ALTER TABLE `blogcomment_table`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `blog_table`
--
ALTER TABLE `blog_table`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `bookappoinment`
--
ALTER TABLE `bookappoinment`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `clinic_table`
--
ALTER TABLE `clinic_table`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `department_table`
--
ALTER TABLE `department_table`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `dept_table`
--
ALTER TABLE `dept_table`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctor_table`
--
ALTER TABLE `doctor_table`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `dr_msg_table`
--
ALTER TABLE `dr_msg_table`
  ADD PRIMARY KEY (`drmsg_id`);

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `message_table`
--
ALTER TABLE `message_table`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `office_table`
--
ALTER TABLE `office_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_doctor_table`
--
ALTER TABLE `our_doctor_table`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `serial_table`
--
ALTER TABLE `serial_table`
  ADD PRIMARY KEY (`serial_id`);

--
-- Indexes for table `thirdparty_table`
--
ALTER TABLE `thirdparty_table`
  ADD PRIMARY KEY (`third_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_table`
--
ALTER TABLE `about_table`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `blogcat_table`
--
ALTER TABLE `blogcat_table`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blogcomment_table`
--
ALTER TABLE `blogcomment_table`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_table`
--
ALTER TABLE `blog_table`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bookappoinment`
--
ALTER TABLE `bookappoinment`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clinic_table`
--
ALTER TABLE `clinic_table`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `department_table`
--
ALTER TABLE `department_table`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dept_table`
--
ALTER TABLE `dept_table`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctor_table`
--
ALTER TABLE `doctor_table`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dr_msg_table`
--
ALTER TABLE `dr_msg_table`
  MODIFY `drmsg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `message_table`
--
ALTER TABLE `message_table`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `office_table`
--
ALTER TABLE `office_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_doctor_table`
--
ALTER TABLE `our_doctor_table`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serial_table`
--
ALTER TABLE `serial_table`
  MODIFY `serial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thirdparty_table`
--
ALTER TABLE `thirdparty_table`
  MODIFY `third_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
