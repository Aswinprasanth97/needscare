<?php
/**
 * Default HTML body copy for NDIS service pages (shown when the page editor is empty).
 *
 * @package NeedsCare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Long-form content per service slug.
 *
 * @return array<string, string>
 */
function needscare_get_service_page_bodies() {
    return array(
        'assist-life-stage-transition'   => '
<p>Life brings many transitions—moving home, starting new routines, leaving hospital, or stepping into work and study. Needs Care provides practical, person-centred support so participants and families feel prepared, safe, and confident at each stage.</p>
<p>We work alongside you, your support network, and other providers to plan what matters most: clear communication, realistic goals, and steady follow-through before, during, and after the change.</p>
<p>Transitions often touch many areas at once—health, housing, relationships, and daily routines. Our team focuses on reducing overwhelm by breaking big changes into manageable steps and checking in regularly so nothing important is left to chance.</p>
<h3>How we can help</h3>
<ul>
<li>Planning and coordination around major life changes</li>
<li>Support before and after hospital or respite discharge</li>
<li>Help to settle into a new home or shared living arrangement</li>
<li>Building routines that match your goals and NDIS plan</li>
<li>Practical help on “first days” in a new setting—orientation, safety, and comfort</li>
<li>Supporting communication with family, support coordinators, and other providers</li>
<li>Identifying risks early and adjusting the plan as your situation evolves</li>
</ul>
<h3>Our approach</h3>
<p>We listen first. Your priorities, cultural preferences, and past experiences shape how support is delivered. Where helpful, we document simple routines or checklists you can reuse with other supporters so continuity is easier across weeks and months.</p>
<h3>Working with your NDIS plan</h3>
<p>Funding and line items depend on your individual plan and goals. If you are unsure what applies, we can talk through your plan in plain language and suggest sensible next steps—including referral or contact with your Local Area Coordinator or plan manager if needed.</p>',
        'assist-personal-activities'    => '
<p>Assist–Personal Activities supports you with everyday self-care and physical routines so you can live as independently as possible in your own home and community.</p>
<p>Our respectful, trained staff follow your preferences and any clinical advice, focusing on dignity, safety, and building confidence at your pace.</p>
<p>Support can be hands-on where required, or focused on prompting and supervision as you build capacity. We match the level of assistance to your goals, always seeking the least intrusive option that keeps you safe and comfortable.</p>
<h3>Examples of support</h3>
<ul>
<li>Showering, dressing, and grooming</li>
<li>Mealtime assistance and prompting where needed</li>
<li>Mobility and transfers with appropriate techniques</li>
<li>Toileting and continence support</li>
<li>Skincare, oral hygiene, and basic hygiene routines</li>
<li>Bed positioning, comfort, and pressure-area awareness where relevant</li>
<li>Using adaptive equipment or aids as part of daily routines</li>
</ul>
<h3>Safety, dignity, and choice</h3>
<p>We train our team to communicate clearly, seek consent, and explain what we are doing—especially when support is personal. If you use behaviour supports, communication devices, or specific routines from a therapist, we aim to follow those plans consistently.</p>
<h3>Who this suits</h3>
<p>This support is for participants who need regular or occasional help with personal care at home or in the community. If your needs are highly complex, we work within the scope agreed in your plan and with advice from your treating clinicians.</p>
<p>Tell us how you like things done—we tailor support to your routine, culture, and goals.</p>',
        'assist-travel-transport'       => '
<p>Getting to appointments, work, study, or community activities should not be a barrier to participation. We can assist with travel and transport so you can reach the places that matter to you.</p>
<p>Support may be one-to-one or focused on building your confidence using taxis, rideshare, or public transport over time.</p>
<p>We understand that travel can be tiring or anxiety-provoking. Our workers can help you plan ahead—what to bring, how long the trip takes, and what to do if plans change—so outings feel more predictable and manageable.</p>
<h3>What this can include</h3>
<ul>
<li>Travel to and from medical and allied health appointments</li>
<li>Support for community, social, and recreational outings</li>
<li>Assistance with shopping, education, or employment travel</li>
<li>Planning routes, timetables, and safe getting on and off vehicles</li>
<li>Developing skills to travel more independently where that is your goal</li>
<li>Support with wayfinding, tickets, and concession cards where applicable</li>
<li>Escorting you from door-to-door when that is what your plan requires</li>
</ul>
<h3>Building independence over time</h3>
<p>Where your goal is to travel more on your own, we can gradually reduce prompts and practise specific legs of a journey—always at a pace that feels safe for you. We celebrate small wins and adjust if something is not working.</p>
<h3>Coordination and scheduling</h3>
<p>Regular appointments are easier when travel is planned. Share your usual schedule and we will do our best to align workers and times. For one-off events, give us as much notice as you can so we can arrange cover.</p>
<p>Contact us to discuss your destinations, schedule, and how we can align with your NDIS plan.</p>',
        'community-nursing-care'        => '
<p>Community Nursing Care brings skilled nursing support into your home or community setting, in line with your plan and treating team recommendations.</p>
<p>Our focus is safe, evidence-based care that fits your environment, with clear communication to you, your family, and your health professionals.</p>
<p>Nursing in the community bridges the gap between hospital and everyday life. It can reduce unnecessary admissions, support recovery after illness or surgery, and help you manage long-term conditions with confidence at home.</p>
<h3>Nursing support may include</h3>
<ul>
<li>Wound assessment and care as directed by your care plan</li>
<li>Medication administration or prompting where clinically indicated</li>
<li>Monitoring and reporting relevant to your health needs</li>
<li>Catheter, stoma, or continence-related support as prescribed</li>
<li>Education for you and carers on managing care at home</li>
<li>Coordination with GPs, specialists, and community allied health</li>
<li>Documentation and handover that supports continuity of care</li>
</ul>
<h3>Clinical governance</h3>
<p>Clinical tasks are delivered according to scope, valid orders, and local regulatory requirements. We escalate concerns promptly when symptoms change or when a review by your doctor or specialist is appropriate.</p>
<h3>Privacy and respect</h3>
<p>Your home is your space. Our nurses introduce themselves, explain procedures, and protect your privacy during visits. Equipment and waste are handled discreetly and in line with infection-control standards.</p>
<p>Reach out to discuss your situation, eligibility, and how community nursing might fit your plan.</p>',
        'daily-tasks-shared-living'     => '
<p>Shared living works best when daily rhythms are clear, respectful, and sustainable for everyone in the home. We support participants with daily life tasks in group or shared arrangements.</p>
<p>We aim to balance individual choice with cooperative living—helping you participate in household life while building skills and confidence.</p>
<p>Every shared home is different. We take time to understand rostering, house rules, and how decisions are made so support fits the whole household—not just one routine.</p>
<h3>Support can cover</h3>
<ul>
<li>Meal planning, preparation, and shared kitchen routines</li>
<li>Cleaning, tidying, and laundry in shared spaces</li>
<li>Organising personal spaces and belongings</li>
<li>Prompting and assistance with daily schedules</li>
<li>Communication strategies for positive housemate relationships</li>
<li>Shopping lists, budgeting for shared items, and fair rotation of chores</li>
<li>Supporting house meetings or check-ins where that helps the home run smoothly</li>
</ul>
<h3>Skills and participation</h3>
<p>Where your goal is to do more for yourself or contribute more to the household, we break tasks into teachable steps and practise them together. Success might look like cooking a favourite meal, managing your own laundry day, or leading a weekly chore roster.</p>
<h3>Working with providers</h3>
<p>We can liaise with your support coordinator, housing provider, or other house-related services when that is agreed with you—always focused on outcomes that respect everyone in the home.</p>
<p>We align with your house rules, provider requirements, and the goals in your plan.</p>',
        'innov-community-participation' => '
<p>Innovative Community Participation is about trying new approaches to build skills, confidence, and meaningful connection—whether through creative activities, technology, volunteering, or tailored community projects.</p>
<p>Needs Care explores options that match your interests and NDIS outcomes, not a one-size-fits-all program.</p>
<p>Innovation does not have to mean something complicated. It can be a fresh way to meet people, a structured trial in a new setting, or using tools and routines that were not part of your week before—but that move you toward a goal you chose.</p>
<h3>Examples of innovative supports</h3>
<ul>
<li>Skill-building through hobbies, arts, or sports-based activities</li>
<li>Structured community trials that step toward your goals</li>
<li>Peer-style or small-group experiences with clear learning outcomes</li>
<li>Pathways toward volunteering, micro-enterprises, or further study</li>
<li>Regular review so supports stay relevant as you grow</li>
<li>Mentoring-style sessions with clear milestones and reflection</li>
<li>Pilot activities with feedback loops so we learn what works for you</li>
</ul>
<h3>Co-design with you</h3>
<p>We start with your strengths and interests. Together we define what success looks like for a short trial period, then adjust based on what you enjoyed, what was hard, and what you want to try next.</p>
<h3>Measuring progress</h3>
<p>Where helpful, we note simple indicators—attendance, confidence, new contacts, or tasks you can now do independently—so you, your family, and your planner can see how supports are helping over time.</p>
<p>Share your ideas—we will work with you to shape something that feels motivating and achievable.</p>',
        'development-life-skills'       => '
<p>Developing life skills supports greater independence in daily living—from managing money and meals to staying organised and solving day-to-day problems.</p>
<p>Sessions are practical and paced to your learning style, with goals broken into clear steps you can practise in real life.</p>
<p>Skills take time to stick. We revisit topics in different contexts—at home, in the shops, or on public transport—so learning transfers beyond a single lesson.</p>
<h3>Skills we often work on</h3>
<ul>
<li>Budgeting, shopping, and handling money safely</li>
<li>Cooking, nutrition basics, and kitchen safety</li>
<li>Time management, planning, and using calendars or reminders</li>
<li>Travel training and community navigation</li>
<li>Communication and self-advocacy in everyday situations</li>
<li>Digital skills for banking, appointments, or staying in touch</li>
<li>Problem-solving when something unexpected happens in the community</li>
</ul>
<h3>How sessions run</h3>
<p>We agree a focus for each period—then practise in real environments where possible. Homework might be small tasks between visits so progress compounds. If something is too hard, we simplify or try another approach.</p>
<h3>Family and supporters</h3>
<p>With your consent, we can share tips with family or other supporters so everyone reinforces the same strategies between sessions.</p>
<p>Tell us what independence looks like for you—we will build a plan around those priorities.</p>',
        'household-tasks'               => '
<p>A safe, hygienic home supports health and wellbeing. Our team can assist with household tasks so you can focus on rest, recovery, and the activities you enjoy.</p>
<p>We respect your home, your belongings, and your preferences for how things are done.</p>
<p>Household standards differ between people. We ask how you like rooms cleaned, which products you prefer, and any areas that are private or off-limits unless you invite us in.</p>
<h3>Household supports may include</h3>
<ul>
<li>General cleaning, vacuuming, and mopping</li>
<li>Kitchen and bathroom cleaning</li>
<li>Laundry, folding, and changing bed linen</li>
<li>Light organising and decluttering support</li>
<li>Basic meal preparation or batch cooking where agreed</li>
<li>Taking bins out, tidying entryways, and seasonal tasks by arrangement</li>
<li>Noticing maintenance issues and helping you report them to your landlord or provider</li>
</ul>
<h3>Health and safety</h3>
<p>We use safe manual handling, appropriate PPE when needed, and infection-control habits—especially in kitchens and bathrooms. If we see a hazard we cannot fix, we will let you know promptly.</p>
<h3>Boundaries</h3>
<p>We do not replace heavy trades, pest control, or specialised cleaning unless explicitly agreed in your support plan. Deep hoarding or biohazard situations need a different type of service—we can help you explore referrals if that applies.</p>
<p>Ask us what fits your funding and goals—we are happy to clarify scope before we start.</p>',
        'participate-community'         => '
<p>Being part of your community—whether through clubs, faith groups, sport, or local events—supports mental health, identity, and belonging. We help you participate safely and on your terms.</p>
<p>That might mean coming along for the first few visits, problem-solving barriers, or gradually stepping back as your confidence grows.</p>
<p>Barriers can be practical, social, or emotional. We work with you on transport, sensory needs, communication, pacing, and backup plans so outings are more likely to succeed.</p>
<h3>Ways we support community participation</h3>
<ul>
<li>Attending social, cultural, or recreational activities with you</li>
<li>Introducing routines for meeting new people or groups</li>
<li>Planning accessible outings and transport links</li>
<li>Supporting communication aids or strategies in public settings</li>
<li>Working toward goals in your NDIS plan around social and community life</li>
<li>Trying short visits first, then extending time as you feel ready</li>
<li>Debriefing after activities so we learn what to repeat or change</li>
</ul>
<h3>Inclusion and respect</h3>
<p>We support you to access mainstream and community settings wherever possible, in line with your choices. If a venue needs adjustments, we can help you ask for them or explore alternatives that still meet your goals.</p>
<h3>Staying connected</h3>
<p>Consistency helps friendships grow. Where you want regular attendance at a group or class, we can help you build a sustainable pattern—so community life becomes part of your week, not just a one-off.</p>
<p>Let us know what communities you want to join—we will help you take the next step.</p>',
        'group-centre-activities'       => '
<p>Group and centre-based activities offer structure, friendship, and variety—whether at a day program, community hub, or organised outing.</p>
<p>Needs Care can assist you to access and enjoy these settings, including preparation, travel, and support during the activity.</p>
<p>Groups can be energising but also tiring or noisy. We help you prepare—what to wear, what to expect, and how to take breaks—so you get the benefits without feeling overwhelmed.</p>
<h3>This support might involve</h3>
<ul>
<li>Attending scheduled group programs or centre days</li>
<li>Recreational and leisure groups in the community</li>
<li>Skill or interest-based workshops</li>
<li>Seasonal events and excursions with a group</li>
<li>Feedback to families or coordinators about how sessions went</li>
<li>Packing bags, meals, or medication reminders according to your plan</li>
<li>Supporting transitions in and out of the venue calmly and on time</li>
</ul>
<h3>Choosing the right fit</h3>
<p>Not every group suits every person. We can try different options, reflect on what you liked, and adjust until you find activities that feel worthwhile and welcoming.</p>
<h3>Communication</h3>
<p>With your permission, we share constructive updates with families or coordinators—especially about attendance, engagement, and any support adjustments that might help you participate more fully.</p>
<p>Ask us about current options in your area and how they align with your plan and preferences.</p>',
    );
}
