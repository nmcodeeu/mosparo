<?php

namespace Mosparo\Form;

use Doctrine\DBAL\Types\FloatType;
use Mosparo\Entity\Rule;
use Mosparo\Util\ChoicesUtil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RuleAddMultipleItemsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $ruleType = $options['rule_type'];
        if ($ruleType === null) {
            return;
        }

        $choices = ChoicesUtil::buildChoices($ruleType->getSubtypes());
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'choices' => $choices,
                'attr' => [
                    'readonly' => (count($choices) === 1),
                    'class' => 'form-select rule-item-type'
                ]
            ])
            ->add('items', TextareaType::class, ['label' => 'Items', 'help' => 'Add one item per line.'])
            ->add('rating', NumberType::class, [
                'label' => 'Rating',
                'required' => false,
                'help' => 'If not set, the default rating is 1.0. If the rating is set to 0.0, the items will not be rated as spam items.'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'rule_type' => null,
            'translation_domain' => 'mosparo',
        ]);
    }
}