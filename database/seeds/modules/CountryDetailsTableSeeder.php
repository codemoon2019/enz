<?php

use App\Models\CountryDetails\CountryDetails;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CountryDetailsTableSeeder
 */
class CountryDetailsTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;
    use DomainSeederHelper;

    /**
     * Run the database seeds.
     *
     * @throws \ReflectionException
     */
    public function run()
    {
        $this->disableForeignKeys();

        $page = $this->modelPageSeeder(new CountryDetails);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'country_id' => 1,
                'title' => 'Why Australia',
                'description' => '<p><strong>10 reasons to study in Australia</strong></p>

<p>Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn&#39;t surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>

<p>These are strong academic credentials, but our institutions are just as highly rated as the cities that house them around the country. Australia has five of the 30 best cities in the world for students based on student mix, affordability, quality of life, and employer activity - all important elements for students when choosing the best study destination. And with more than A$200 million provided by the Australian Government each year in international scholarships, we&#39;re making it easier for you to come and experience the difference an Australian education can make to your future career opportunities.</p>

<p>Do you have a specific study area of interest? There is every chance Australia has you covered, with at least one Australian university in the top 50 worldwide across the study areas of Natural Sciences &amp; Mathematics, Life &amp; Agricultural Sciences, Clinical Medicine &amp; Pharmacy, and Physics.</p>

<p>Given this impressive education pedigree, it&#39;s not surprising there are now more than 2.5 million former international students who have gone on to make a difference after studying in Australia. Some of these students are among the world&#39;s finest minds. In fact, Australia has produced 15 Nobel prize laureates and every day over 1 billion people around the world rely on Australian discoveries and innovations - including penicillin, IVF, ultrasound, Wi-Fi, the Bionic Ear, cervical cancer vaccine and Black Box Flight Recorders - to make their lives, and the lives of others, better.</p>

<p>Why wouldn&#39;t you want to study with some of the best minds in the world?</p>

<p><br />
<strong>Sources:&nbsp;</strong></p>

<ol>
    <li><a href="http://www.oecd.org/education/eag2012.htm" rel="noopener" target="_blank">www.oecd.org</a></li>
    <li><a href="http://cricos.deewr.gov.au/" rel="noopener" target="_blank">cricos.deewr.gov.au</a></li>
    <li><a href="http://www.topuniversities.com/university-rankings" rel="noopener" target="_blank">www.topuniversities.com/university-rankings</a></li>
    <li><a href="http://www.topuniversities.com/city-rankings" rel="noopener" target="_blank">www.topuniversities.com/city-rankings</a></li>
    <li><a href="http://www.universitas21.com" rel="noopener" target="_blank">www.universitas21.com</a></li>
    <li><a href="http://www.australiaawards.gov.au" rel="noopener" target="_blank">www.australiaawards.gov.au</a></li>
    <li><a href="http://www.timeshighereducation.co.uk" rel="noopener" target="_blank">www.timeshighereducation.co.uk</a></li>
    <li><a href="http://www.ieaa.org.au" rel="noopener" target="_blank">www.ieaa.org.au</a></li>
    <li><a href="http://www.smartestinvestment.com.au" rel="noopener" target="_blank">www.smartestinvestment.com.au</a></li>
    <li><a href="http://www.studyinaustralia.gov.au" rel="noopener" target="_blank">www.studyinaustralia.gov.au</a></li>
</ol>
',
                'order' => 0,
            ],
            [
                'country_id' => 1,
                'title' => 'Entry Requirements',
                'description' => '<p>To begin studying in Australia, there are a range of entry requirements you may have to meet.</p>

<p><strong>English language requirements</strong><br />
In some cases, you may need to provide results of an English language test. Be aware that the English language skill level required by an institution can be different from the level of skill required for your student visa application. You should carefully check student visa information on both the <a href="http://immi.gov.au/">Department of Immigration and Border Protection (DIBP)</a> website and the institution website for any English language requirements.</p>

<p><strong>Academic requirements</strong><br />
The academic requirements (including evidence of English language skills) you need to study in Australia will vary depending on the level of education you want to study. Institutions can have different entry requirements, so read the course information on their website carefully and contact them to ask for advice.</p>

<p>Here is some general guidance on entry requirements for the different levels of study:</p>

<ul>
    <li><strong>English language</strong> - Entry requirements vary between institutions, and according to the level of English language course you want to study.</li>
    <li><strong>Schools</strong> - Entry requirements vary between schools depending on the state or territory you will be studying in. Academic performance and ability is considered during the application process.</li>
    <li><strong>Vocational education and training</strong> - In most cases there are no entrance exams for VET institutions. However, some courses may have specific pre-requisite subjects or work experience requirements.</li>
    <li><strong>Higher Education Undergraduate</strong> - To gain entry into an Australian undergraduate course you will need to have an Australian Senior Secondary Certificate of Education (Year 12), or the overseas equivalent. Some undergraduate courses may also have specific pre-requisite subjects.</li>
    <li><strong>Higher Education Postgraduate</strong> - As well as the satisfactory completion of at least one degree at undergraduate level, your institution may take research ability or relevant work experience into consideration.</li>
</ul>

<p><strong>Tip:</strong> To meet the academic requirements of an Australian high school qualification, consider taking a Foundation course. Also called bridging study, they are intensive courses that will help you meet the entry requirements. They are usually one year long and are offered by most higher education institutions.</p>

<p>The student visa you need depends on your chosen course of study. As a guide, the typical key requirements you will need to meet are:</p>

<ul>
    <li>Issued an electronic Confirmation of Enrolment (eCoE) certificate.</li>
    <li>Meet the Genuine Temporary Entrant requirement. Read more about this on the <a href="http://www.immi.gov.au/students/knight/" rel="noopener" target="_blank">Department of Immigration and Border Protection</a> website.</li>
    <li>Sufficient funds for airfares, course fees and living costs.</li>
    <li>English language proficiency.</li>
    <li>Meet health and character requirements.</li>
    <li>Acceptable Overseas Student Health Cover (OSHC).</li>
</ul>

<p>Read more about the <a href="http://www.immi.gov.au/allforms/pdf/applying-student.pdf" rel="noopener" target="_blank">Student Visa Key Requirements</a></p>

<p>The <a href="http://www.immi.gov.au/" rel="noopener" target="_blank">DIBP</a> website provides detailed information on student visas. It also has a <a href="http://www.immi.gov.au/visawizard/" rel="noopener" target="_blank">Visa Wizard</a> to help you identify which visa you might be eligible for.</p>

<p><strong>Overseas Student Health Cover</strong><br />
Australia has a special system of health cover for international students called Overseas Student Health Cover (OSHC). It will help you pay for medical or hospital care you may need while you&#39;re studying in Australia; it will also contribute towards the cost of most prescription medicines and an ambulance in an emergency. When studying in Australia, you will need OSHC for yourself, and any family travelling with you, before you arrive. It is a requirement of your student visa that you maintain OSHC for the duration of your time on a student visa in Australia.</p>

<p>Read more about OSHC on the &#39;Insurance&#39; page in the &#39;Live in Australia&#39; section of this website.</p>

<p><strong>Sources:&nbsp;</strong></p>

<ul>
    <li><a href="http://www.studyinaustralia.gov.au/global/apply-to-study/entry-requirements/entry-requirements" rel="noopener" target="_blank">http://www.studyinaustralia.gov.au</a></li>
</ul>
',
                'order' => 1,
            ],
            [
                'country_id' => 1,
                'title' => 'Cost of Living',
                'description' => '<p>Knowing the average living costs in Australia is an important part of your financial preparation. For your reference, here are some of the costs associated with living and studying in Australia. (All costs are in Australian dollars.)</p>

<p>Accommodation</p>

<ul>
    <li><strong>Hostels and Guesthouses</strong> - $80 to $135 per week</li>
    <li><strong>Shared Rental</strong> - $70 to $250 per week</li>
    <li><strong>On campus</strong> - $80 to $250 per week</li>
    <li><strong>Homestay</strong> - $110 to $270 per week</li>
    <li><strong>Rental</strong> - $100 to $400 per week</li>
    <li><strong>Boarding schools</strong> - $10,000 to $20,000 a year</li>
</ul>

<p>Other living expenses</p>

<ul>
    <li><strong>Groceries and eating out</strong> - $80 to $200 per week</li>
    <li><strong>Gas, electricity</strong> - $60 to $100 per week</li>
    <li><strong>Phone and Internet</strong> - $20 to $50 per week</li>
    <li><strong>Public transport</strong> - $10 to $50 per week</li>
    <li><strong>Car (after purchase)</strong> - $150 to $250 per week</li>
    <li><strong>Entertainment</strong> - $50 to $100 per week</li>
</ul>

<p>Minimum cost of living<br />
The Department of Immigration and Border Protection has financial requirements you must meet in order to receive a student visa. Below is a guide on the requirements you must meet to study in Australia:</p>

<ul>
    <li><strong>You</strong> - $18,610</li>
    <li><strong>Your partner</strong> - $6,515</li>
    <li><strong>Your first child</strong> - $3,720</li>
    <li><strong>Every other child</strong> - $2,790</li>
</ul>

<p>All costs are per year in Australian dollars. To convert to your own currency, visit <a href="http://www.xe.com/" rel="noopener" target="_blank">http://www.xe.com</a></p>

<p>The Australian Government provides information and guidance on managing your finances. You can read more at <a href="http://www.moneysmart.gov.au" rel="noopener" target="_blank">www.moneysmart.gov.au</a></p>

<p>If you experience financial trouble while in Australia, talk to your institution&#39;s international student support staff for assistance.</p>

<p><strong>Sources:&nbsp;</strong><br />
<a href="http://www.studyinaustralia.gov.au/global/live-in-australia/living-costs/living-costs-in-australia" rel="noopener" target="_blank">http://www.studyinaustralia.gov.au</a></p>
',
                'order' => 2,
            ],
            [
                'country_id' => 1,
                'title' => 'Working while you study',
                'description' => '<p>Working while you study in Australia can help complement your study and living experience. There are a number of reasons you might want to undertake part time work while studying in Australia, including assisting with living expenses and gaining work experience in your study area.</p>

<p>Most student visas allow you to work for up to 40 hours every two weeks while your course is in session, and unrestricted hours during any scheduled course break, but before you undertake any paid work you need to make sure your visa allows you to work. Find out more at the Department of Immigration and Border Protection website.</p>

<p><strong>Paid Work</strong><br />
Australia has a wide range of industries and many have part time employment opportunities, including:</p>

<ul>
    <li><strong>Retail</strong> - supermarkets, department and clothing stores.</li>
    <li><strong>Hospitality</strong> - cafes, bars and restaurants.</li>
    <li><strong>Tourism</strong> - hotels and motels.</li>
    <li><strong>Agricultural</strong> - farming and fruit-picking.</li>
    <li><strong>Sales and telemarketing</strong>.</li>
    <li><strong>Administration or Clerical roles</strong>.</li>
    <li><strong>Tutoring</strong>.</li>
</ul>

<p>If you have existing qualifications and/or professional work experience, you may be able to secure casual or part time work in your field.</p>

<p><strong>Internships</strong><br />
Paid or unpaid internships can be a great way to get exposure to the professional, financial and creative industries. Learn more about getting an internship on the Internships page in the Education System section of this website.</p>

<p><strong>Volunteering</strong><br />
There are many charities and non-government organisations (NGOs) in Australia and they always need volunteers to help out. It can be a great way to meet friends, get some hands on work experience and give back to the community. To find out more about volunteering, start your search at: <a href="http://www.govolunteer.com.au/" rel="noopener" target="_blank">http://www.govolunteer.com.au</a></p>

<p><strong>Your rights</strong><br />
Everyone working in Australia, including international students or those on working holiday visas, have basic rights at work. These rights protect entitlement to:</p>

<ul>
    <li>A minimum wage.</li>
    <li>Challenge of unfair dismissal from the job</li>
    <li>Breaks and rest periods.</li>
    <li>A healthy and safe work environment.</li>
</ul>

<p>Most employers in Australia are covered by an &#39;award&#39;, which sets minimum wages and conditions for a given field of work or industry. To find out more about your work rights visit the Australian Government&#39;s <a href="http://www.fairwork.gov.au/internationalstudents" rel="noopener" target="_blank">Fair Work</a> website.</p>

<p>You will also need to get a tax file number to work in Australia. Visit the <a href="http://www.ato.gov.au/" rel="noopener" target="_blank">Australian Taxation Office</a> website to find out more information on getting a tax file number, as well as information about paying taxes in Australia.</p>

<p><strong>Finding work</strong><br />
There are plenty of ways to find work that suits you, including:</p>

<ul>
    <li>Newspapers and online job sites.</li>
    <li>Some institutions provide job notice-boards on campus and online. Contact your institution&#39;s international student support staff to find out what options your institution offers.</li>
    <li>Register your details at a recruitment firm; many of them help place people in casual or short-term work.</li>
</ul>

<p>&nbsp;</p>

<p><strong>Sources:&nbsp;</strong></p>

<p><a href="http://www.studyinaustralia.gov.au/global/live-in-australia/working/work-while-you-study" rel="noopener" target="_blank">http://www.studyinaustralia.gov.au</a><br />
&nbsp;</p>
',
                'order' => 3,
            ],
            [
                'country_id' => 1,
                'title' => 'Education Facts',
                'description' => '<p>Australia is known globally as being one of the world&#39;s most diverse and welcoming countries, and it is something for which we take great pride. In fact, of Australia&#39;s 23 million population, almost half (47%) of all Australians were either born overseas or have one parent born overseas. We also know a thing or two about languages, with more than 260 languages spoken in Australian homes: in addition to English, the most common are Mandarin, Italian, Arabic, Cantonese and Greek.</p>

<p>Australia&#39;s diversity and friendly attitude is matched by its economic stability. To date, Australia has experienced more than 20 years of continued economic growth, weathering the 2008 global financial crisis better than most advanced economies. And we are as competitive on the global economic stage as we are in the world&#39;s sporting arenas! Not surprising, with more than 120 certified sports organisations around the country, covering popular activities such as AFL, cricket, football (soccer), rugby league, golf, tennis, netball and hockey to name just a few.</p>

<p>You may not know but Australia is the biggest island in the world, the sixth-biggest country in the world in land area, and the only nation to govern an entire continent. Within our expansive country, there are more than 500 national parks and more than 2,700 conservation areas, ranging from wildlife sanctuaries to Aboriginal reserves. There are also seventeen UNESCO World Heritage sites - more than any other country - including the Great Barrier Reef, Kakadu National Park, Lord Howe Island Group, Tasmanian Wilderness, Fraser Island and the Sydney Opera House.</p>

<p>But many people around the world know Australia for being a beautiful country. We also have world-class infrastructure, with five of the top 40 cities with the best infrastructure in the world. We also have a reputation for building &#39;big&#39; things - over 150 in fact from the Big Banana in New South Wales, to the Big Koala in Victoria, the Big Mango in Queensland, and the Big Ram in Western Australia. It&#39;s worth a trip to see them all!</p>

<p>With all these wonderful attributes around Australia, we have good reason to be happy. So much so, we were recently ranked as the fourth happiest country in the world behind only Norway, Denmark and Sweden.</p>

<p>Why wouldn&#39;t you want to experience the best Australia has to offer?</p>

<p><strong>Sources:&nbsp;</strong><br />
<a href="http://www.studyinaustralia.gov.au/global/apply-to-study/entry-requirements/entry-requirements" rel="noopener" target="_blank">http://www.studyinaustralia.gov.au</a></p>
',
                'order' => 4,
            ],
            [
                'country_id' => 1,
                'title' => 'Study Visa Options',
                'description' => '<p>There are several classes of student visas for Australia - the one you need depends on the type of study (eg: English language course, graduate degree, vocational training,higher education, etc.) you are planning to undertake.</p>

<p>Student visa options<br />
Below is the list of the student visas currently available. For more detail on each visa, visit the <a href="http://www.immi.gov.au/students/students/chooser/" rel="noopener" target="_blank">Department of Immigration and Border Protection (DIBP)</a> :</p>

<ul>
    <li>Independent ELICOS (Subclass 570).</li>
    <li>Schools (Subclass 571).</li>
    <li>Vocational Education and Training (Subclass 572).</li>
    <li>Higher Education (Subclass 573).</li>
    <li>Postgraduate Research (Subclass 574).</li>
    <li>Non-award (Subclass 575).</li>
    <li>Foreign Affairs or Defence (Subclass 576).</li>
</ul>

<p>Other visa options<br />
For shorter periods of study, you can apply for a Visitor or Working Holiday Maker Visa. There is also a visa option specifically for student guardians.<br />
Visitor Visa (Subclasses 600, 601, 651)</p>

<ul>
    <li>Maximum 3 months study.</li>
    <li>Intention to visit Australia is genuine.</li>
    <li>Meet health and character requirements.</li>
    <li>Sufficient money to support yourself during stay in Australia.</li>
</ul>

<p>Read more about <a href="http://www.immi.gov.au/visas/visitor/">Visitors Visas</a> on the DIBP website.<br />
Working Holiday Visa (Subclass 417)</p>

<ul>
    <li>Maximum 4 months study.</li>
    <li>Aged 18 to 30 years and hold an eligible passport.</li>
    <li>Principal purpose to holiday in Australia.</li>
    <li>Enter or remain in Australia as a genuine visitor.</li>
    <li>Meet health and character requirements.</li>
    <li>Sufficient funds for airfares and personal support for stay in Australia.</li>
</ul>

<p>Read more about <a href="http://www.immi.gov.au/visitors/working-holiday/" rel="noopener" target="_blank">Working Holiday Visas</a> on the DIBP website.<br />
Student Guardian (Subclass 580)</p>

<ul>
    <li>Provides for certain persons to reside with a student in Australia, where the student requires a guardian, ie: the studnet is under 18 years of age.</li>
    <li>Study up to 3 months or study ELICOS for 20 hours per week for duration of visa.</li>
    <li>Meet Genuine Temporary Entrant requirement.</li>
    <li>Sufficient funds for airfares and living costs.</li>
    <li>Meet health and character requirements.</li>
    <li>Acceptable health insurance.</li>
</ul>

<p>Read more about <a href="http://www.immi.gov.au/students/student_guardians/580/" rel="noopener" target="_blank">Student Guardian visas</a> on the DIBP website.<br />
Temporary Graduate (Subclass 485)</p>

<ul>
    <li>This visa allows eligible international students who have completed an Australian education to stay in Australia to gain work experience.</li>
    <li>You can work in Australia for a period of 18 months and up to 4 years, depending on your qualification.</li>
    <li>This visa does not restrict the type of work you may do or the number of hours you may work.</li>
    <li>Applications for this visa must be made in Australia and you must hold an eligible student visa in the last 6 months.</li>
    <li>You must meet Australian study, English proficiency, health insurance, health and character requirements.</li>
    <li>You must meet the specific requirements of the stream in which you are applying for this visa.</li>
</ul>

<p>Read more about <a href="http://www.immi.gov.au/Visas/Pages/485" rel="noopener" target="_blank">Temporary Graduate visas</a> on the DIBP website.</p>

<p>Visa options and requirements are sometimes subject to change. In order to stay up to date, the best place to get accurate information is on the <a href="http://www.immi.gov.au/">Department of Immigration and Border Protection website</a>. The website provides comprehensive information on the types of visas available for different levels of study in Australia, including people considering bring family members with them (whether guardians, partners/spouses or children). You will also have access to help and advice about your specific visa requirements.</p>

<p>Another option is to contact an education agent, who can help with your visa application, course application, and answer any other questions.</p>

<p>&nbsp;</p>

<p><strong>Sources:&nbsp;</strong><br />
<a href="http://www.studyinaustralia.gov.au/global/apply-to-study/visas/visa-information" rel="noopener" target="_blank">http://www.studyinaustralia.gov.au</a><br />
&nbsp;</p>
',
                'order' => 5,
            ],
            [
                'country_id' => 2,
                'title' => 'Why New Zealand',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 2,
                'title' => 'Entry Requirements',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 2,
                'title' => 'Cost of Living',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 2,
                'title' => 'Working while you study',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 2,
                'title' => 'Education Facts',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 2,
                'title' => 'Study Visa Options',
                'description' => 'Sample Description',
                'order' => 5,
            ],
            [
                'country_id' => 3,
                'title' => 'Why Canada',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 3,
                'title' => 'Entry Requirements',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 3,
                'title' => 'Cost of Living',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 3,
                'title' => 'Working while you study',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 3,
                'title' => 'Education Facts',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 3,
                'title' => 'Study Visa Options',
                'description' => 'Sample Description',
                'order' => 5,
            ],
        ];

        foreach ($data as $key => $value) {
            
            $model = CountryDetails::create($value);

        }

        $this->enableForeignKeys();
    }
}
