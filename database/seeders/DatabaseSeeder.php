<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        Article::create([
            'title' => 'Mental Health: Understanding, Managing, and Promoting Well-being',
            'content' => <<<EOD
Introduction
Mental health is an essential aspect of human well-being that often remains overlooked or underappreciated. While we commonly associate health with physical ailments, mental health plays a pivotal role in how we think, feel, and act. It influences our emotional regulation, our ability to cope with stress, and our capacity to build meaningful relationships. As such, maintaining mental health is just as crucial as taking care of physical health. Yet, the conversation around mental health has historically been stigmatized and misunderstood, leaving many people struggling without the help they need.

In this article, we explore the complexities of mental health, why it matters, the challenges people face, and strategies for improving and maintaining mental well-being. We will also delve into common mental health disorders, the importance of self-care, and the role of therapy, medication, and social support in promoting mental health.

What Is Mental Health?
Mental health refers to a person’s emotional, psychological, and social well-being. It affects how individuals think, feel, and behave in their daily lives. Mental health also influences how we handle stress, relate to others, and make decisions. Mental health is not just the absence of mental disorders—it is a positive state where people are able to cope with life's challenges, work productively, and contribute to their communities.

Mental health is influenced by a combination of factors, including genetics, environment, life experiences, and physical health. While everyone has moments of stress or emotional difficulty, mental health concerns arise when these challenges affect daily functioning and overall well-being.

The Importance of Mental Health
Mental health is integral to living a full and balanced life. Here are some reasons why mental health is so crucial:

Emotional Resilience: A mentally healthy person has the emotional resilience to navigate life's ups and downs. They are able to recover from setbacks, cope with stress, and adapt to changes in their environment.

Physical Health: Mental health is closely linked to physical health. Chronic stress, anxiety, or depression can weaken the immune system, increase the risk of chronic illnesses, and lead to problems like high blood pressure, heart disease, and digestive issues.

Relationships and Social Well-being: Good mental health contributes to healthy, positive relationships. It helps people to communicate effectively, handle conflicts in relationships, and form supportive bonds with family, friends, and colleagues.

Work and Productivity: Mental health significantly impacts professional success and productivity. Those with mental health challenges may struggle with concentration, decision-making, or motivation, which can hinder their performance and job satisfaction.

Quality of Life: Mental health is foundational to an individual’s overall quality of life. People who experience mental health issues may have difficulty enjoying activities they once loved or engaging with others, which can lead to feelings of isolation and despair.

Mental Health Disorders: Common Conditions and Symptoms
Mental health disorders can affect anyone, regardless of age, background, or life circumstances. While many people experience occasional emotional distress, mental health disorders are diagnosed when symptoms are persistent, interfere with daily activities, or significantly impact a person's quality of life. Here are some of the most common mental health disorders:

1. Anxiety Disorders
Anxiety disorders are the most common mental health disorders, affecting millions worldwide. These include generalized anxiety disorder (GAD), panic disorder, social anxiety disorder, and specific phobias. Symptoms include persistent worry, fear, or nervousness, often out of proportion to the situation. Physical symptoms such as racing heart, sweating, and trembling can accompany anxiety.

Symptoms: Restlessness, difficulty concentrating, excessive worry, fatigue, irritability, and physical symptoms like headaches and muscle tension.
Treatment: Cognitive-behavioral therapy (CBT), exposure therapy, medication (antidepressants or anti-anxiety medications), and relaxation techniques.
2. Depression
Depression is one of the most prevalent and serious mental health conditions. People with depression often feel a pervasive sense of sadness, hopelessness, and lack of interest in activities that were once enjoyable. Depression can manifest in both emotional and physical symptoms.

Symptoms: Persistent sadness, lack of energy, insomnia or oversleeping, changes in appetite or weight, difficulty concentrating, and thoughts of death or suicide.
Treatment: Antidepressants, psychotherapy (especially CBT and interpersonal therapy), and lifestyle changes such as regular physical activity and mindfulness practices.
3. Bipolar Disorder
Bipolar disorder is characterized by extreme mood swings, ranging from periods of intense highs (mania or hypomania) to deep lows (depression). These mood swings can affect a person's energy, behavior, judgment, and ability to think clearly.

Symptoms: During manic episodes, individuals may feel euphoric, overly energetic, and impulsive. During depressive episodes, they may experience hopelessness, sadness, and lack of motivation.
Treatment: Mood stabilizers, antipsychotic medications, psychotherapy, and lifestyle modifications.
4. Obsessive-Compulsive Disorder (OCD)
OCD involves persistent, unwanted thoughts (obsessions) and repetitive behaviors (compulsions) that an individual feels compelled to perform in order to reduce anxiety or prevent a feared event.

Symptoms: Recurrent intrusive thoughts, compulsive behaviors (e.g., washing hands repeatedly, checking things multiple times), and significant distress or interference with daily life.
Treatment: Cognitive-behavioral therapy (specifically exposure and response prevention), medication (SSRIs), and relaxation techniques.
5. Post-Traumatic Stress Disorder (PTSD)
PTSD can develop after an individual has been exposed to a traumatic event. People with PTSD may relive the trauma through flashbacks, nightmares, or intrusive thoughts, and may experience heightened anxiety, irritability, and emotional numbness.

Symptoms: Flashbacks, nightmares, avoidance of reminders of the trauma, hyperarousal (e.g., difficulty sleeping, irritability), and emotional numbness.
Treatment: Trauma-focused therapy (such as EMDR or trauma-focused CBT), medication (SSRIs, SNRIs), and support groups.
6. Eating Disorders
Eating disorders like anorexia nervosa, bulimia nervosa, and binge eating disorder involve extreme behaviors related to food, body image, and weight. These disorders often coexist with other mental health conditions like depression and anxiety.

Symptoms: Obsession with food, body image, and weight, extreme dietary restrictions, binge eating, or purging behaviors.
Treatment: Psychotherapy (CBT, family-based therapy), nutritional counseling, and medical intervention for physical health issues.
The Role of Therapy in Mental Health
Therapy is one of the most effective treatments for mental health disorders. A variety of therapeutic approaches can help individuals better understand and manage their mental health challenges. Here are a few common therapeutic approaches:

Cognitive-Behavioral Therapy (CBT): CBT focuses on changing negative thought patterns and behaviors. It’s particularly effective for anxiety, depression, OCD, and PTSD.

Dialectical Behavior Therapy (DBT): DBT is a form of therapy that emphasizes mindfulness, emotional regulation, and coping strategies. It’s commonly used to treat borderline personality disorder (BPD), depression, and suicidal ideation.

Interpersonal Therapy (IPT): IPT focuses on improving interpersonal relationships and social functioning, and is often used to treat depression and anxiety.

Family Therapy: Family therapy involves working with family members to address the dynamics that may contribute to an individual’s mental health struggles. It is particularly useful for eating disorders, substance abuse, and adolescents.

Eye Movement Desensitization and Reprocessing (EMDR): EMDR is used to treat trauma and PTSD by helping individuals process distressing memories in a safe and controlled way.

Medication and Mental Health
While therapy is often the first line of treatment for many mental health conditions, medication can play a vital role, especially in managing symptoms of anxiety, depression, bipolar disorder, and schizophrenia. Medications may include:

Antidepressants: SSRIs, SNRIs, and tricyclic antidepressants (TCAs) help regulate mood by affecting neurotransmitters in the brain.
Anti-anxiety medications: Benzodiazepines and other medications can provide short-term relief from anxiety symptoms, although they are generally prescribed for brief periods due to the risk of dependence.
Mood stabilizers: Used to treat bipolar disorder, these help prevent extreme mood swings.
Antipsychotics: For conditions like schizophrenia or severe bipolar disorder, antipsychotic medications can help manage symptoms such as delusions and hallucinations.
It’s important to work with a healthcare provider to determine the right medication, dosage, and combination of treatments that work best for an individual’s needs.

Self-Care and Mental Health
While therapy and medication are important tools for managing mental health, self-care practices can significantly improve well-being and prevent mental health issues from becoming overwhelming. Here are some self-care strategies:

Exercise: Physical activity is one of the most effective ways to reduce stress, improve mood, and promote overall well-being.
Mindfulness and Meditation: These practices can help reduce anxiety, improve focus, and cultivate a sense of calm.
Healthy Diet: Eating a balanced diet with plenty of fruits, vegetables, and whole grains can support brain health and improve mood.
Sleep: Prioritizing good sleep hygiene can have a profound impact on mental health, as poor sleep is linked to depression, anxiety, and irritability.
Social Support: Staying connected with family and friends provides emotional support, reduces feelings of isolation, and promotes overall happiness.
EOD,
            'reading_time' => '15 minutes',
            'publish_date' => '2024-11-28',
        ]);

        Article::create([
            'title' => 'What is mental health?',
            'content' => <<<EOD
Mental health is about how people think, feel, and behave. Mental health care professionals can help people manage conditions such as depression, anxiety, bipolar disorder, addiction, and other disorders that affect their thoughts, feelings, and behaviors.

Mental health can affect a person’s day-to-day life, relationships, and physical health. External factors in people’s lives and relationships can also contribute to their mental well-being.

Looking after one’s mental health can help a person maintain their ability to enjoy life. This involves balancing their activities, responsibilities, and efforts to achieve psychological resilience.

Stress, depression, and anxiety can affect mental health and may disrupt a person’s routine.

Although healthcare professionals often use the term “mental health,” doctors recognize that many mental health conditions have physical roots.

This article explains what mental health and mental health conditions mean. It also describes the most common types of mental health disorders, including their early signs and how to treat them.

The WHO states that mental health is “more than the absence of mental disorders.” Peak mental health is about managing active conditions and maintaining wellness and happiness.

The organization also emphasizes that preserving and restoring mental health is important at individual, community, and societal levels.

In the United States, the National Alliance on Mental Illness estimates that almost 1 in 5 adults experience mental health problems each year.

Risk factors for mental health conditions
Everyone is at some risk of developing a mental health disorder, regardless of age, sex, income, or ethnicity. In the U.S. and much of the developed world, depression is one of the leading causesTrusted Source of disability.

Social and financial circumstances, adverse childhood experiences, biological factors, and underlying medical conditions can allTrusted Source shape a person’s mental well-being.

Many people with a mental health disorder have more than oneTrusted Source condition at the same time.

It is important to note that mental well-being depends on a balance of factors, and several elements may contribute to the development of a mental health disorder.

The following factors can contribute to mental health conditions.

Socioeconomic pressure
Having limited financial means or belonging to a marginalized ethnic group can increase the risk of mental health disorders as a result of biases in healthcare.

A 2015 Iranian studyTrusted Source describes several socioeconomic causes of mental health conditions, including poverty and living on the outskirts of a large city.

The researchers also described flexible (modifiable) and inflexible (nonmodifiable) factors that can affect the availability and quality of mental health care treatment for certain groups.

Modifiable factors for mental health disorders include:

socioeconomic conditions, such as whether work is available in a local area
occupation
a person’s level of social involvement
education
housing quality
Nonmodifiable factors include:

gender
age
ethnicity
nationality
The researchers found that being female increased the risk of low mental health status by nearly four times. People with a “weak economic status” scored highest for mental health conditions in this study.

Childhood adversity
Several studiesTrusted Source report that childhood traumas such as child abuse, parental loss, parental separation, and parental illness significantly affect a growing child’s mental and physical health.

There are associations between childhood abuse and other adverse events and mental health disorders. These experiences also make people vulnerable to post-traumatic stress disorder (PTSD).

Biological factors
The NIMH suggests that a person’s family history can increase the likelihoodTrusted Source of mental health conditions, as specific genes and gene variants put a person at higher risk. However, having a gene associated with a mental health disorder does not guarantee that a condition will develop.

Likewise, people without related genes or a family history of mental health conditions may have a mental health disorder.

Chronic stress and mental health disorders such as depression and anxiety may develop due to underlying physical health problems, such as cancer, diabetes, and chronic pain.
EOD,
            'reading_time' => '8 minutes',
            'publish_date' => '2024-11-21',
        ]);

        Article::create([
            'title' => 'Young people’s mental health is finally getting the attention it needs',
            'content' => <<<EOD
Worldwide, at least 13% of people between the ages of 10 and 19 live with a diagnosed mental-health disorder, according to the latest State of the World’s Children report, published this week by the United Nations children’s charity UNICEF. It’s the first time in the organization’s history that this flagship report has tackled the challenges in and opportunities for preventing and treating mental-health problems among young people. It reveals that adolescent mental health is highly complex, understudied — and underfunded. These findings are echoed in a parallel collection of review articles published this week in a number of Springer Nature journals.

Anxiety and depression constitute more than 40% of mental-health disorders among young people (those aged 10–19). UNICEF also reports that, worldwide, suicide is the fourth most-common cause of death (after road injuries, tuberculosis and interpersonal violence) among adolescents (aged 15–19). In eastern Europe and central Asia, suicide is the leading cause of death for young people in that age group — and it’s the second-highest cause in western Europe and North America.

Sadly, psychological distress among young people seems to be rising. One study found that rates of depression among a nationally representative sample of US adolescents (aged 12 to 17) increased from 8.5% of young adults to 13.2% between 2005 and 20171. There’s also initial evidence that the coronavirus pandemic is exacerbating this trend in some countries. For example, in a nationwide study2 from Iceland, adolescents (aged 13–18) reported significantly more symptoms of mental ill health during the pandemic than did their peers before it. And girls were more likely to experience these symptoms than were boys.

Although most mental-health disorders arise during adolescence, UNICEF says that only one-third of investment in mental-health research is targeted towards young people. Moreover, the research itself suffers from fragmentation — scientists involved tend to work inside some key disciplines, such as psychiatry, paediatrics, psychology and epidemiology, and the links between research and health-care services are often poor. This means that effective forms of prevention and treatment are limited, and lack a solid understanding of what works, in which context and why.

This week’s collection of review articles dives deep into the state of knowledge of interventions — those that work and those that don’t — for preventing and treating anxiety and depression in young people aged 14–24. In some of the projects, young people with lived experience of anxiety and depression were co-investigators, involved in both the design and implementation of the reviews, as well as in interpretation of the findings.

Quest for new therapies
Worldwide, the most common treatment for anxiety and depression is a class of drug called selective serotonin reuptake inhibitors, which increase serotonin levels in the brain and are intended to enhance emotion and mood. But their modest efficacy and substantial side effects3 have spurred the study of alternative physiological mechanisms that could be involved in youth depression and anxiety, so that new therapeutics can be developed.

For example, researchers have been investigating potential links between depression and inflammatory disorders — such as asthma, cardiovascular disease and inflammatory bowel disease. This is because, in many cases, adults with depression also experience such disorders. Moreover, there’s evidence that, in mice, changes to the gut microbiota during development reduce behaviours similar to those linked to anxiety and depression in people4. That suggests that targeting the gut microbiome during adolescence could be a promising avenue for reducing anxiety in young people. Kathrin Cohen Kadosh at the University of Surrey in Guildford, UK, and colleagues reviewed existing reports of interventions in which diets were changed to target the gut microbiome. These were found to have had minimal effect on youth anxiety5. However, the authors urge caution before such a conclusion can be confirmed, citing methodological limitations (including small sample sizes) among the studies they reviewed. They say the next crop of studies will need to involve larger-scale clinical trials.

By contrast, researchers have found that improving young people’s cognitive and interpersonal skills can be more effective in preventing and treating anxiety and depression under certain circumstances — although the reason for this is not known. For instance, a concept known as ‘decentring’ or ‘psychological distancing’ (that is, encouraging a person to adopt an objective perspective on negative thoughts and feelings) can help both to prevent and to alleviate depression and anxiety, report Marc Bennett at the University of Cambridge, UK, and colleagues6, although the underlying neurobiological mechanisms are unclear.

In addition, Alexander Daros at the Campbell Family Mental Health Institute in Toronto, Canada, and colleagues report a meta-analysis of 90 randomized controlled trials. They found that helping young people to improve their emotion-regulation skills, which are needed to control emotional responses to difficult situations, enables them to cope better with anxiety and depression7. However, it is still unclear whether better regulation of emotions is the cause or the effect of these improvements.
EOD,
            'reading_time' => '5 minutes',
            'publish_date' => '2024-11-24',
        ]);
    }
}
