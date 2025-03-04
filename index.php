<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Landing Page</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Hero Section -->
        <section class="hero">
            <h1 class="hero-title">Built on dreams, driven by excellence</h1>
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number">300+</div>
                    <div class="stat-text">Happy Customers</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5+</div>
                    <div class="stat-text">Properties for clients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">6+</div>
                    <div class="stat-text">Years of Experience</div>
                </div>
            </div>
        </section>

        <script>
        document.querySelectorAll('.value-card, .achievement-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>

        <section class="section values-section">
            <h2 class="section-title">Our Values</h2>
            <p class="section-subtitle">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create value.</p>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">⭐</div>
                    <h3 class="value-title">Trust</h3>
                    <p class="value-description">Trust is the foundation of every successful real estate transaction.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🏆</div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">We set the bar high for ourselves, from the properties we list to the services we provide.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">👥</div>
                    <h3 class="value-title">Client-Centric</h3>
                    <p class="value-description">Your dreams and needs are at the center of our universe. We listen, understand.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3 class="value-title">Commitment</h3>
                    <p class="value-description">We are dedicated to providing you with the highest level of service, professionalism, and support.</p>
                </div>
            </div>
        </section>

        <section class="section achievements-section">
            <h2 class="section-title">Our Achievements</h2>
            <p class="section-subtitle">Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.</p>
            <div class="achievements-grid">
                <div class="achievement-card">
                    <h3 class="achievement-title">3+ Years of Excellence</h3>
                    <p class="achievement-description">With over 3 years in the industry, we've amassed a wealth of knowledge and experience, becoming a go-to resource for all things real estate.</p>
                </div>
                <div class="achievement-card">
                    <h3 class="achievement-title">Happy Clients</h3>
                    <p class="achievement-description">Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.</p>
                </div>
                <div class="achievement-card">
                    <h3 class="achievement-title">Industry Recognition</h3>
                    <p class="achievement-description">We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence.</p>
                </div>
            </div>
        </section>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll('.value-card, .achievement-card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
                card.style.boxShadow = '0px 10px 15px rgba(255, 215, 0, 0.3)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
                card.style.boxShadow = 'none';
            });
        });

        // Scroll Animation
    //     const sections = document.querySelectorAll('.values-section, .achievements-section');

    //     const observer = new IntersectionObserver((entries) => {
    //         entries.forEach(entry => {
    //             if (entry.isIntersecting) {
    //                 entry.target.style.opacity = "1";
    //                 entry.target.style.transform = "translateY(0)";
    //             }
    //         });
    //     }, { threshold: 0.2 });

    //     sections.forEach(section => {
    //         section.style.opacity = "0";
    //         section.style.transform = "translateY(50px)";
    //         section.style.transition = "all 0.6s ease-out";
    //         observer.observe(section);
    //     });
    // });

    </script>

    <section id="about">
        
    </section>

    <section class="about-section">
        <div class="about-container">
            <div class="image-grid">
                <div class="image-item">
                    <img src="../assets/images/about1.jpg" alt="Aerial view of a modern building">
                </div>
                <div class="image-item large">
                    <img src="../assets/images/about2.jpg" alt="Tall contemporary building">
                </div>
                <div class="image-item">
                    <img src="../assets/images/about3.jpg" alt="Detailed architectural design">
                </div>
            </div>
            <div class="about-content">
                <h2>About Us</h2>
                <div class="about-text">
                    <p>Welcome to Sri Samhitha Enterprises – Where Innovation Meets Excellence

                        At Sri Samhitha Enterprises, we take pride in transforming landscapes and redefining real estate excellence. As a trusted name in the industry, we specialize in crafting premium residential, commercial, and mixed-use developments that blend luxury, comfort, and sustainability. Our unwavering commitment to quality, transparency, and customer satisfaction drives us to deliver world-class living and working environments that exceed expectations. We aim to develop thoughtfully designed real estate projects that combine aesthetic appeal with functional value, meticulously planned to cater to the evolving needs of modern homeowners, businesses, and investors. By integrating cutting-edge technology and contemporary architecture, we create spaces that foster comfort, convenience, and a sense of belonging. Our vision is to set new benchmarks in the real estate industry by embracing sustainable building practices, advanced construction technologies, and innovative design concepts. We aspire to build vibrant communities that not only enhance the urban landscape but also promote eco-friendly and smart living solutions. With a customer-centric approach, we prioritize client needs, delivering tailor-made solutions for diverse lifestyles and business requirements. We adhere to the highest standards of construction, ensuring durability and excellence in every project. Our commitment to transparency and integrity fosters trust and long-term relationships with clients and stakeholders. Our projects incorporate modern amenities and infrastructure, including state-of-the-art security systems and eco-friendly designs, to offer a superior living and working experience. Through sustainability and innovation, we adopt green building practices to create energy-efficient, future-ready spaces. At Sri Samhitha Enterprises, we don’t just build structures—we create experiences that enrich lives. Join us in shaping a future where luxury, comfort, and sustainability go hand in hand.
                        
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const imageItems = document.querySelectorAll(".image-item img");

        // Hover effect for desktops
        imageItems.forEach((img) => {
            img.addEventListener("mouseenter", () => {
                img.style.transform = "scale(1.05)";
            });

            img.addEventListener("mouseleave", () => {
                img.style.transform = "scale(1)";
            });
        });

        // Click effect for mobile users (optional)
        imageItems.forEach((img) => {
            img.addEventListener("click", () => {
                img.style.transform = "scale(1.05)";
                setTimeout(() => img.style.transform = "scale(1)", 300);
            });
        });
    });

    </script>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
            const teamMembers = document.querySelectorAll(".team-member");

            // Hover effect for desktop
            teamMembers.forEach(member => {
                member.addEventListener("mouseenter", () => {
                    member.style.transform = "translateY(-5px)";
                });

                member.addEventListener("mouseleave", () => {
                    member.style.transform = "translateY(0)";
                });
            });

            // Tap effect for mobile users
            teamMembers.forEach(member => {
                member.addEventListener("touchstart", () => {
                    member.style.transform = "translateY(-5px)";
                });

                member.addEventListener("touchend", () => {
                    setTimeout(() => {
                        member.style.transform = "translateY(0)";
                    }, 300);
                });
            });
        });

    </script>

    <section class="hero1">
        <div class="hero-container">
            <div class="content">
                <h1>Start your real estate journey today</h1>
                <div class="text-button-wrapper">
                    <p>Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Explore our properties or get in touch for personalized assistance.</p>
                    <a href="project.php" class="explore-btn" id="exploreBtn">Explore Properties</a>
                    <script>
                        document.getElementById("exploreBtn").addEventListener("click", function () {
                            window.location.href = "project.php";
                        });
                    </script>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('exploreBtn').addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({
            top: window.innerHeight - 50, // Adjusted to avoid exact viewport edge
            behavior: 'smooth'
        });
    });

    window.addEventListener('scroll', function () {
        const hero = document.querySelector('.hero1');
        const scrolled = window.pageYOffset;

        // Only apply background movement on larger screens (disable for mobile)
        if (window.innerWidth > 768) {
            hero.style.backgroundPositionY = scrolled * 0.5 + 'px';
        } else {
            hero.style.backgroundPositionY = 'center';
        }
    });

    </script>

<?php include 'includes/footer.php'; ?>

    
</body>
</html>