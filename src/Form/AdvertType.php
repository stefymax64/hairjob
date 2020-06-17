<?php

namespace App\Form;

use App\Entity\Skill;
use App\Repository\CategoryRepository;
Use App\Repository\AdvertSkillRepository;
use App\Repository\SkillRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $pattern = '%';

        $builder
            ->add('date', DateTimeType::class)
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('content', CKEditorType::class)
            ->add('image', ImageType::class)
            ->add('categories', EntityType::class, [
                'class' => 'App\Entity\Category',
                'choice_label' => 'name',
                'multiple' => true,
                'query_builder' => function (CategoryRepository $repository) use ($pattern) {
                    return $repository->getLikeQueryBuilder($pattern);
                }])
            ->add('skills', EntityType::class, [
                'class' => 'App\Entity\Skill',
                'choice_label' => 'name',
                'multiple' => true,
                'query_builder' => function (SkillRepository $repository) use ($pattern) {
                    return $repository->getLikeQueryBuilder($pattern);
                }])
            ->add('advert_skills', EntityType::class, [
                'class' => 'App\Entity\AdvertSkill',
                'choice_label' => 'level',
                'multiple' => true,
                'query_builder' => function (AdvertSkillRepository $repository) use ($pattern) {
                    return $repository->getLikeQueryBuilder($pattern);
                }])
            ->add('save', SubmitType::class);

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $advert = $event->getData();
                if (null === $advert) {
                    return;
                }

                if (!$advert->getPublished() || null === $advert->getId()) {
                    $event->getForm()->add('published', CheckboxType::class, [
                        'required' => false]);
                } else {
                    $event->getForm()->remove('published');
                }
            });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Advert']);
    }
}