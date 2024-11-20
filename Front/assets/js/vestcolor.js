
                                        function changeMainImage(color) {
                                            const mainImage = document.getElementById('mainImage');
                                            mainImage.src = `assets/img/shop/${color}.png`;
                                            const mainImageLink = document.querySelector('.ss-big-image-wrap');
                                            mainImageLink.href = `assets/img/shop/${color}.png`;
                                        }
                                        changeMainImage('black');
                                   
                                    